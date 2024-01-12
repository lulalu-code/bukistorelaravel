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
            "title" => "Cesta de bambù",
            "description" => " Cesta de bambù mimbre",
            "author_name" => "User1",
            "category" => "Decoración",
            "cm_height" => "20",
            "cm_width" => "40",
            "cm_length" => "40",
            "is_customable" => true,
            "imageURL" => "https://img.freepik.com/foto-gratis/mercado-asiatico-cestas-bambu-mimbre_1147-350.jpg?w=996&t=st=1705058816~exp=1705059416~hmac=80c0af148a59e82b37ab95467eea37122b3ec98a337a814ad5a60e653c195231",
            "price" => "70"
        ]);

        Product::create([
            "title" => "Jarra",
            "description" => "Jarra de poterìa",
            "author_name" => "User2",
            "category" => "Decoración",
            "cm_height" => "10",
            "cm_width" => "5",
            "cm_length" => "5",
            "is_customable" => false,
            "imageURL" => "https://img.freepik.com/foto-gratis/jarra-terminar_1098-13687.jpg?w=1060&t=st=1705058818~exp=1705059418~hmac=89c7e1c12435bcc9c2a7283b92f5f2a8e9bd103b8c5b0f14fdd7fdfbeb93fc6c",
            "price" => "10"
        ]);
        
        Product::create([
            "title" => "Arte de madera",
            "description" => "Pieza de arte de madera con pintura",
            "author_name" => "User3",
            "category" => "Decoración",
            "cm_height" => "20",
            "cm_width" => "10",
            "cm_length" => "1",
            "is_customable" => false,
            "imageURL" => "https://img.freepik.com/foto-gratis/proceso-pintura-piezas-arte-madera_23-2148271008.jpg?w=1060&t=st=1705058818~exp=1705059418~hmac=3f97a448dd3e0cb4eb4c01fc9d624aac12454ed5c495a9cf3d3d1414f2ac7090",
            "price" => "25"
        ]);

        Product::create([
            "title" => "Zapatos",
            "description" => "Zapatos de cuero hechos a mano",
            "author_name" => "User4",
            "category" => "Ropa",
            "cm_height" => "10",
            "cm_width" => "10",
            "cm_length" => "20",
            "is_customable" => true,
            "imageURL" => "https://img.freepik.com/foto-gratis/cerca-zapatero-trabajando-cuero_171337-12289.jpg?w=1060&t=st=1705058820~exp=1705059420~hmac=42271a923907bcef58eb759cdcbfc2fdccd50d9139c8f44d004f8dc2df139ddd",
            "price" => "150"
        ]);

        Product::create([
            "title" => "Cromos",
            "description" => "Liga F",
            "author_name" => "User4",
            "category" => "Juguetes",
            "cm_height" => "10",
            "cm_width" => "5",
            "cm_length" => "0",
            "is_customable" => false,
            "imageURL" => "https://img.freepik.com/foto-gratis/dando-toques-finales-ilustraciones_1098-18131.jpg?w=1060&t=st=1705058821~exp=1705059421~hmac=3a969ecbf746348da3cd1a03199c57e39f2a96e208055945625a326950a0ef41",
            "price" => "5"
        ]);

        Product::create([
            "title" => "Bol decorativo",
            "description" => "Bol decorativo",
            "author_name" => "User5",
            "category" => "Vajilla",
            "cm_height" => "10",
            "cm_width" => "14",
            "cm_length" => "14",
            "is_customable" => false,
            "imageURL" => "https://img.freepik.com/foto-gratis/talla-mano-mujer-tazon-pintura_23-2148155240.jpg?w=1060&t=st=1705058822~exp=1705059422~hmac=8373f8e0a23fc1a07aad45e9d568a7e2ac0ba2ef6c4cb4de319749bbcd6853eb",
            "price" => "15"
        ]);

        Product::create([
            "title" => "Cromos",
            "description" => "Liga F",
            "author_name" => "User1",
            "category" => "Juguetes",
            "cm_height" => "10",
            "cm_width" => "5",
            "cm_length" => "0",
            "is_customable" => false,
            "imageURL" => "https://img.freepik.com/foto-gratis/colorida-decoracion-recuerdo-simbolo-amor-cristianismo-generada-ia_188544-24535.jpg?w=1380&t=st=1705058826~exp=1705059426~hmac=8d970f9b6a9b4905ec2807af6e5f9931d4ee446f66bb0b1cbdbd62ed38826046",
            "price" => "5"
        ]);

        Product::create([
            "title" => "Cromos",
            "description" => "Liga F",
            "author_name" => "User2",
            "category" => "Juguetes",
            "cm_height" => "10",
            "cm_width" => "5",
            "cm_length" => "0",
            "is_customable" => false,
            "imageURL" => "https://img.freepik.com/foto-gratis/cerrar-manos-pintura-amarilla_23-2148944918.jpg?w=1060&t=st=1705058827~exp=1705059427~hmac=bcc3f87f1bcf717b19eda61777335b7e3c6b2078ba02f5df88d2559ab6800dfc",
            "price" => "5"
        ]);

        Product::create([
            "title" => "Cromos",
            "description" => "Liga F",
            "author_name" => "User3",
            "category" => "Juguetes",
            "cm_height" => "10",
            "cm_width" => "5",
            "cm_length" => "0",
            "is_customable" => false,
            "imageURL" => "https://img.freepik.com/foto-gratis/joyas-hechas-mano-piedras-preciosas_181624-59159.jpg?w=740&t=st=1705059124~exp=1705059724~hmac=5d677856183f105e8f2126e3a052319923fe641fdb1217bb98141d0b6dfac5fa",
            "price" => "5"
        ]);

        Product::create([
            "title" => "Cromos",
            "description" => "Liga F",
            "author_name" => "User2",
            "category" => "Juguetes",
            "cm_height" => "10",
            "cm_width" => "5",
            "cm_length" => "0",
            "is_customable" => false,
            "imageURL" => "https://img.freepik.com/foto-gratis/dando-toques-finales-ilustraciones_1098-18131.jpg?w=1060&t=st=1705058821~exp=1705059421~hmac=3a969ecbf746348da3cd1a03199c57e39f2a96e208055945625a326950a0ef41",
            "price" => "5"
        ]);

        Product::create([
            "title" => "Estanteria",
            "description" => "Estanteria bonita de madera lacada blanca.",
            "author_name" => "User4",
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
            "author_name" => "User5",
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
            "author_name" => "User1",
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
            "author_name" => "User1",
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
