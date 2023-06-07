<?php
namespace App\Repository;

interface iCountryRepo
{
    public function all($query);
    public function create(array $data);
    public function getById($id);
    public function update($id, array $data);
    public function archive();
    public function delete($id);
    public function restore($id);
}
