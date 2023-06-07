<?php

namespace App\Http\Controllers\Api;

use App\Events\CountryCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Jobs\SendEmailJob;
use App\Mail\MailNotify;
use Illuminate\Http\Request;
use App\Repository\iCountryRepo;
use App\Http\Resources\CountryResource;
use Illuminate\Support\Facades\Mail;

class CountryController extends Controller
{
    protected $countryRepo;

    public function __construct(iCountryRepo $countryRepo){
        $this->countryRepo = $countryRepo;
    }
    public function index(Request $request)
    {
        $query = $request->input('query');
        if (!empty($query)) {
            $countries = $this->countryRepo->all($query);
        } else {
            $countries = $this->countryRepo->all($query);
        }

        return CountryResource::collection($countries);
    }
    public function store(CountryRequest $request)
    {
        {
            $data = $request->all();
            $country = $this->countryRepo->create($data);

            # send email after create a country
            event(new CountryCreated($country));

            return new CountryResource($country);
        }
    }

    public function show($id){
        $country = $this->countryRepo->getById($id);
        if($country){
            return new CountryResource($country);
        }
        else {
            return response()->json('Not found!');
        }
    }

    public function update(CountryRequest $request, $id){
        {
            $data = [
                'country_code' => $request->country_code,
                'country_name' => $request->country_name,
            ];
            $country = $this->countryRepo->update($id, $data);

            return new CountryResource($country);
        }
    }

    public function archive(){
        $country = $this->countryRepo->archive();
        return CountryResource::collection($country);
    }

    public function destroy($id){
        $country = $this->countryRepo->delete($id);
        return response()->json([
           'message' => 'Country deleted successfully',
            ]);
    }

    public function restore($id){
        $this->countryRepo->restore($id);
        return response()->json([
          'message' => 'Country restored successfully',
            ]);
    }
}
