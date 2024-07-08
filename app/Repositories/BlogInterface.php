<?php
namespace App\Repositories;

interface BlogInterface {
    public function all();
    public function get($id);
    public function store($data);
    public function update ($id,$data);
    public function delete($id);
}
