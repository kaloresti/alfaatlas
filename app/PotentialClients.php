<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PotentialClients extends Model
{
    use Notifiable;

    protected $table = 'potential_clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cnpj',
        'incricao_estatudal',
        'razao_social',
        'nome_fantasia',
        'nome_responsavel',
        'telefone',
        'email_principal',
        'celular',
        'cep',
        'cidade',
        'bairro',
        'estado',
        'pais',
        'logradouro',
        'numero',
        'status',
        'spc',
        'cerasa',
        'fonte',
    ];


    public $types = [
        'accounting',
        'airport',
        'amusement_park',
        'aquarium',
        'art_gallery',
        'atm',
        'bakery',
        'bank',
        'bar',
        'beauty_salon',
        'bicycle_store',
        'book_store',
        'bowling_alley',
        'bus_station',
        'cafe',
        'campground',
        'car_dealer',
        'car_rental',
        'car_repair',
        'car_wash',
        'casino',
        'cemetery',
        'church',
        'city_hall',
        'clothing_store',
        'convenience_store',
        'courthouse',
        'dentist',
        'department_store',
        'doctor',
        'electrician',
        'electronics_store',
        'embassy',
        'fire_station',
        'florist',
        'funeral_home',
        'furniture_store',
        'gas_station',
        'gym',
        'hair_care',
        'hardware_store',
        'hindu_temple',
        'home_goods_store',
        'hospital',
        'insurance_agency',
        'jewelry_store',
        'laundry',
        'lawyer',
        'library',
        'liquor_store',
        'local_government_office',
        'locksmith',
        'lodging',
        'meal_delivery',
        'meal_takeaway',
        'mosque',
        'movie_rental',
        'movie_theater',
        'moving_company',
        'museum',
        'night_club',
        'painter',
        'park',
        'parking',
        'pet_store',
        'pharmacy',
        'physiotherapist',
        'plumber',
        'police',
        'post_office',
        'real_estate_agency',
        'restaurant',
        'roofing_contractor',
        'rv_park',
        'school',
        'shoe_store',
        'shopping_mall',
        'spa',
        'stadium',
        'storage',
        'store',
        'subway_station',
        'supermarket',
        'synagogue',
        'taxi_stand',
        'train_station',
        'transit_station',
        'travel_agency',
        'veterinary_care',
        'zoo',
    ];

    public $searchs = [
        'findPlace' => 'Categorias',
        'nearbySearch' => 'Localização',
        'textSearch' => 'Texto Livre'
    ];

    public function rules(){
        return [
            "lat" => 'required',
            "lng" => 'required',
            "locality" => 'required',
            "radius" => 'required',
            "type" => 'required'
        ];
    }

    public function messages()
    {
        return [
            "lat.required" => "Locality do not correct",
            "lng.required'  => 'Locality do not correct",
            "locality.required'  => 'Locality do not correct",
            "radius.required'  => 'You must be choice a radius in KM",
            "type.required'  => 'You must be choice one category",
        ];
    }

}
