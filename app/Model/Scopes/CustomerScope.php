<?php

namespace App\Model\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class CustomerScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model){
        if (!empty(Auth::user())) {
            $idClient = Auth::user()->id_client;
            // if different of the FKSapiens apply scope
            if ($idClient != 1)
                $builder->where('id_client', '=', $idClient);
        }
    }
}