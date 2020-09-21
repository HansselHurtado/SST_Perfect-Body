<?php

use Illuminate\Database\Seeder;
use App\Texto;


class TextosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $texto = new Texto();
        $texto->titulo = "Solo es texto para el titulo";
        $texto->texto = "es simplemente texto de relleno de la industria de la impresión y la composición tipográfica. 
                        Lorem Ipsum ha sido el texto de relleno estándar de la industria desde
                        la década de 1500, cuando un impresor desconocido tomó una galera de tipos y la mezcló para hacer un libro de muestras tipográfico. Ha sobrevivido no solo a cinco siglos, sino también al salto a la composición tipográfica electrónica, permaneciendo esencialmente sin cambios. Se popularizó en la década de 1960 con el lanzamiento de hojas de Letraset que contienen pasajes de Lorem Ipsum y, más recientemente, con software de autoedición como Aldus PageMaker que incluye versiones de Lorem Ipsum";
        $texto->estado = 1;
        $texto->save();

        $texto = new Texto();
        $texto->titulo = "SST para la salud ocupacional";
        $texto->texto = "Es un hecho establecido desde hace mucho tiempo que un lector se distraerá con el contenido legible 
                        de una página al mirar su diseño. El objetivo de usar Lorem Ipsum es que tiene una distribución de letras más o menos normal, en lugar de usar 'Contenido aquí, contenido aquí', lo que hace que parezca un inglés legible. Muchos paquetes de autoedición y editores de páginas web ahora usan Lorem Ipsum como su modelo de texto predeterminado, y una búsqueda de 'lorem ipsum' revelará muchos sitios web aún en su infancia. Varias versiones han evolucionado a 
                        lo largo de los años, a veces por accidente, a veces a propósito (humor inyectado y similares).";    
        $texto->estado = 1;
        $texto->save();

        $texto = new Texto();
        $texto->titulo = "Esto es para responder el Covid-19";
        $texto->texto = "Hay muchas variaciones de pasajes de Lorem Ipsum disponibles, pero la mayoría han sufrido alteraciones de alguna forma, por humor inyectado o palabras 
                        aleatorias que no parecen ni un poco creíbles. Si va a utilizar un pasaje de Lorem Ipsum, 
                        debe asegurarse de que no haya nada vergonzoso escondido en medio del texto. Todos los generadores de Lorem Ipsum en Internet tienden a repetir fragmentos predefinidos según sea necesario, lo que lo convierte en el primer generador verdadero en Internet. Utiliza un diccionario de más de 200 palabras latinas, combinado con un puñado de estructuras de oraciones modelo, para generar Lorem Ipsum que parece razonable. Por lo tanto, el Lorem Ipsum generado está siempre libre de repeticiones, humor inyectado o palabras no características, et";    
        $texto->estado = 1;
        $texto->save();

    }
}
