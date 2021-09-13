<?php

namespace App\Console\Commands;

use App\Models\Tactic;
use App\Models\Technique;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class updateTacticsCommand extends Command
{
    protected $signature = 'tactics:update';

    protected $description = 'This command get tactics from repository and store in database';

    public function handle()
    {
        $response = Http::get(config('tactic.url'));

        $responseBody = json_decode($response->body(), true);

        $objects = collect($responseBody['objects']);

        $tactics = $objects->where('type', 'x-mitre-tactic');

        foreach ($tactics as $tactic) {
            Tactic::updateOrCreate(
                ['mitre_tactic_id' => $tactic['id']],
                [
                    'name' => $tactic['name'],
                    'slug' => $tactic['x_mitre_shortname'],
                    'description' => $tactic['description'],
                    'mitre_created' => Carbon::parse($tactic['created'])->toDateTimeString(),
                    'mitre_modified' => Carbon::parse($tactic['modified'])->toDateTimeString()
                ]
            );
        }

        $techniques = $objects->where('type', 'attack-pattern')->whereNotNull('kill_chain_phases');

        $techniques_relations = [];

        $tactics = Tactic::all()->pluck('id', 'slug');

        foreach ($techniques as $item) {

            $technique = Technique::updateOrCreate(
                ['mitre_technique_id' => $item['id']],
                [
                    'name' => $item['name'],
                    'description' => $item['description'],
                    'mitre_created' => Carbon::parse($item['created'])->toDateTimeString(),
                    'mitre_modified' => Carbon::parse($item['modified'])->toDateTimeString()
                ]
            );

            foreach ($item['kill_chain_phases'] as $value) {
                if($value['kill_chain_name'] === 'mitre-attack') {
                    $technique->tactics()->attach($tactics[$value['phase_name']]);
                }
            }

            if ($item['x_mitre_is_subtechnique']) {

                $technique_parent_id = $objects->where('relationship_type', 'subtechnique-of')->where('source_ref', $item['id'])->pluck('target_ref')->first();

                $techniques_relations[] = [
                    'id' => $technique->id,
                    'parent_id' => $technique_parent_id
                ];

            }
        }

        if(!empty($techniques_relations)) {
            foreach ($techniques_relations as $item) {
                $parent = Technique::where('mitre_technique_id', $item['parent_id'])->first();
                Technique::find($item['id'])->update(['technique_id' => $parent->id]);
            }
        }
    }
}
