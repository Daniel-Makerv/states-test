<?php

namespace App\Http\Services\State;

use App\Http\Services\Inegi\InegiService;
use App\Models\State;
use Exception;

class StateService
{
    private $inegiService;

    public function __construct(InegiService $inegiService)
    {
        $this->inegiService = $inegiService;
    }

    /**
     * getStates
     *
     * @return void
     */
    public function getStates()
    {
        try {
            $states = State::all();

            if ($states->isEmpty()) {
                $this->syncStates();
                $states = State::all();
            }

            return $states;
        } catch (\Exception $err) {
            throw new Exception('Error Processing Request: '.$err->getMessage(), 1);
        }
    }

    /**
     * syncStates
     * function to sync states
     */
    private function syncStates(): void
    {

        $httpService = new InegiService;

        try {
            $response = $httpService->get('wscatgeo/mgee/');

            $body = $response->getBody()->getContents();

            $data = json_decode($body, true);

            foreach ($data['datos'] as $state) {
                $stateCreated = State::create([
                    'geostatistical_key' => $state['cvegeo'],
                    'state_code' => $state['cve_agee'],
                    'state_name' => $state['nom_agee'],
                    'state_abbreviation' => $state['nom_abrev'],
                    'total_population' => $state['pob'],
                    'female_population' => $state['pob_fem'],
                    'male_population' => $state['pob_mas'],
                    'total_houses' => $state['viv'],
                ]);
            }
        } catch (\GuzzleHttp\Exception\RequestException $err) {
            throw new Exception('Error Processing Request'.$err->getMessage(), 500);
        }
    }
}
