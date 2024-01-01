<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            "title" => "Estanteria",
            "description" => "Estanteria bonita de madera lacada blanca.",
            "author_name" => "Lulu",
            "category" => "Muebles",
            "cm_height" => "160",
            "cm_width" => "60",
            "cm_length" => "40",
            "is_customable" => false,
            "imageURL" => "https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcSpucuz92wNzJVBMhwmySxZg4N3FX4J82qthNMvVPmONMVcTWGU0gkUkJZB7ENXVh-kTcIZr5IUw194gNAs_g6JQ4OLs9pi2xHwzxlP2-kG4KXXQ8CFibpPwla5jP8SGJh5_bLpdg&usqp=CAc",
            "price" => "70"
        ]);

        Product::create([
            "title" => "Peluche de Bimbo",
            "description" => "Peluche de perro negro hecha con algodón reciclado.",
            "author_name" => "Bimbo",
            "category" => "Juguetes",
            "cm_height" => "30",
            "cm_width" => "15",
            "cm_length" => "15",
            "is_customable" => false,
            "imageURL" => "https://ae01.alicdn.com/kf/H318a1b789af541db858a26dfb36aa7ebK/Peluche-de-perro-negro-de-imitaci-n-para-ni-os-juguete-creativo-realista-de-perro-sentado.jpg_.webp",
            "price" => "10"
        ]);

        Product::create([
            "title" => "Wagon",
            "description" => "De Tren.",
            "author_name" => "Muami",
            "category" => "Transporte",
            "cm_height" => "3000",
            "cm_width" => "2000",
            "cm_length" => "6000",
            "is_customable" => false,
            "imageURL" => "https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/001015_gauge_buster.jpg/300px-001015_gauge_buster.jpg",
            "price" => "3000"
        ]);

        Product::create([
            "title" => "Cromos",
            "description" => "Liga F",
            "author_name" => "Lulu",
            "category" => "Juguetes",
            "cm_height" => "10",
            "cm_width" => "5",
            "cm_length" => "0",
            "is_customable" => false,
            "imageURL" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEdh_MatetdMuEmTIhf3Cl3VC-Fn2BHr5xtHWix5NRQaqRL8tQideHA387iWtoPyBb-4A&usqp=CAU",
            "price" => "5"
        ]);

        Product::create([
            "title" => "Cromos",
            "description" => "Liga F",
            "author_name" => "Lulu",
            "category" => "Juguetes",
            "cm_height" => "10",
            "cm_width" => "5",
            "cm_length" => "0",
            "is_customable" => false,
            "imageURL" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEdh_MatetdMuEmTIhf3Cl3VC-Fn2BHr5xtHWix5NRQaqRL8tQideHA387iWtoPyBb-4A&usqp=CAU",
            "price" => "5"
        ]);

        Product::create([
            "title" => "Cromos",
            "description" => "Liga F",
            "author_name" => "Lulu",
            "category" => "Juguetes",
            "cm_height" => "10",
            "cm_width" => "5",
            "cm_length" => "0",
            "is_customable" => false,
            "imageURL" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEdh_MatetdMuEmTIhf3Cl3VC-Fn2BHr5xtHWix5NRQaqRL8tQideHA387iWtoPyBb-4A&usqp=CAU",
            "price" => "5"
        ]);
        
        Product::create([
            "title" => "Cromos",
            "description" => "Liga F",
            "author_name" => "Lulu",
            "category" => "Juguetes",
            "cm_height" => "10",
            "cm_width" => "5",
            "cm_length" => "0",
            "is_customable" => false,
            "imageURL" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEdh_MatetdMuEmTIhf3Cl3VC-Fn2BHr5xtHWix5NRQaqRL8tQideHA387iWtoPyBb-4A&usqp=CAU",
            "price" => "5"
        ]);

        Product::create([
            "title" => "Cromos",
            "description" => "Liga F",
            "author_name" => "Lulu",
            "category" => "Juguetes",
            "cm_height" => "10",
            "cm_width" => "5",
            "cm_length" => "0",
            "is_customable" => false,
            "imageURL" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEdh_MatetdMuEmTIhf3Cl3VC-Fn2BHr5xtHWix5NRQaqRL8tQideHA387iWtoPyBb-4A&usqp=CAU",
            "price" => "5"
        ]);

        Product::create([
            "title" => "Cromos",
            "description" => "Liga F",
            "author_name" => "Lulu",
            "category" => "Juguetes",
            "cm_height" => "10",
            "cm_width" => "5",
            "cm_length" => "0",
            "is_customable" => false,
            "imageURL" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEdh_MatetdMuEmTIhf3Cl3VC-Fn2BHr5xtHWix5NRQaqRL8tQideHA387iWtoPyBb-4A&usqp=CAU",
            "price" => "5"
        ]);
    }
}
