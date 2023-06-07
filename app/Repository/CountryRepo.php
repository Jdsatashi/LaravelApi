<?php
    namespace App\Repository;
    use App\Models\Country;

    class CountryRepo implements iCountryRepo{
        public function all($query)
        {
            if(!empty($query)){
                return Country::where('country_name', 'like', '%' . $query . '%')
                    ->orWhere('country_code', 'like', '%' . $query . '%')
                    ->get();
            }
            return Country::paginate(10);
        }

        public function create(array $data)
        {
            return Country::create($data);
        }

        public function getById($id)
        {
            return Country::find($id);
        }

        public function update($id, array $data)
        {
            $country = Country::findOrFail($id);
            $country->update($data);
            return $country;
        }
        public function archive()
        {
            return Country::onlyTrashed()->paginate(10);
        }
        public function delete($id)
        {
            $country = Country::findOrFail($id);
            $country->delete();
        }
        public function restore($id){
            return Country::onlyTrashed()->find($id)->restore();
        }
    }
