<?php

namespace Database\Factories;

use App\Models\Contacto;
use App\Models\InfoContacto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InfoContacto>
 */
class InfoContactoFactory extends Factory
{
    protected $model = InfoContacto::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generar un número de teléfono aleatorio de 10 dígitos
        $telefono = $this->faker->numberBetween(1000000000, 9999999999);

        // Asegurarse de que el número de teléfono tenga exactamente 10 dígitos
        $telefono = substr($telefono, 0, 10);
        return [
            'telefono' => $telefono,
            'correo' => $this->faker->unique()->safeEmail,
            'direccion' => $this->faker->address,
        ];
    }

    //se configura la opcion para que la llave foranea se llene con la informacion que se tiene en la tabla contacto
    public function configure()
    {
        return $this->afterMaking(function(InfoContacto $infoContacto){// el método afterMaking para que busque un contacto existente utilizando el método inRandomOrder() 
            $contacto = Contacto::inRandomOrder()->first();//y luego seleccione el primero encontrado utilizando first(). Esto garantiza que el InfoContacto esté asociado a un Contacto existente en la base de datos.
            $infoContacto->contacto_id= $contacto->id;
        });
    }
}
