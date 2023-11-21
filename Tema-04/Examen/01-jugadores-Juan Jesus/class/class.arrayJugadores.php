<?php

/*
        Tabla de Usuarios.

        Es un array donde cada elemento es un objeto de la clase
        Usuario.
    */

class tablaJugadores
{

    private $tabla;

    public function __construct() {
        $this->tabla = [];
    }
 
    // Getters and Setters
    public function getTabla() {
        return $this->tabla;
    }
 
    public function setTabla($tabla) {
        $this->tabla = $tabla;
    }

    # Create()

    public function create($jugador) {
        $this->tabla[] = $jugador;
    }

    # Delete()

    public function delete($index) {
        if (isset($this->tabla[$index])) {
            unset($this->tabla[$index]);
        }
    }


    # Read()

    public function read($index) {
        if (isset($this->tabla[$index])) {
            return $this->tabla[$index];
        }
        return null;
    }
 

    # Update()

    public function update($jugador, $index) {
        if (isset($this->tabla[$index])) {
            $this->tabla[$index] = $jugador;
        }
    }
    
    
    public static function getPaises() {
     $paises = array(
        "Afganistán", 
     "Albania", 
     "Alemania", 
     "Andorra", 
     "Angola", 
     "Antigua y Barbuda", 
     "Arabia Saudita", "Argelia", "Argentina", "Armenia", 
     "Australia", "Austria", "Azerbaiyán", "Bahamas", 
     "Bangladés", "Barbados", "Baréin", "Bélgica", "Belice", 
     "Benín", "Bielorrusia", "Birmania", "Bolivia", 
     "Bosnia y Herzegovina", "Botsuana", "Brasil", "Brunéi", 
     "Bulgaria", "Burkina Faso", "Burundi", "Bután", "Cabo Verde", "Camboya", "Camerún", "Canadá", "Catar", "Chad", "Chile", "China", "Chipre", "Ciudad del Vaticano", "Colombia", "Comoras", "Corea del Norte", "Corea del Sur", "Costa de Marfil", "Costa Rica", "Croacia", "Cuba", "Dinamarca", "Dominica", "Ecuador", "Egipto", "El Salvador", "Emiratos Árabes Unidos", "Eritrea", "Eslovaquia", "Eslovenia", "España", "Estados Unidos", "Estonia", "Etiopía", "Filipinas", "Finlandia", "Fiyi", "Francia", "Gabón", "Gambia", "Georgia", "Ghana", "Granada", "Grecia", "Guatemala", "Guyana", "Guinea", "Guinea ecuatorial", "Guinea-Bisáu", "Haití", "Honduras", "Hungría", "India", "Indonesia", "Irak", "Irán", "Irlanda", "Islandia", "Islas Marshall", "Islas Salomón", "Israel", "Italia", "Jamaica", "Japón", "Jordania", "Kazajistán", "Kenia", "Kirguistán", "Kiribati", "Kuwait", "Laos", "Lesoto", "Letonia", "Líbano", "Liberia", "Libia", "Liechtenstein", "Lituania", "Luxemburgo", "Madagascar", "Malasia", "Malaui", "Maldivas", "Malí", "Malta", "Marruecos", "Mauricio", "Mauritania", "México", "Micronesia", "Moldavia", "Mónaco", "Mongolia", "Montenegro", "Mozambique", "Namibia", "Nauru", "Nepal", "Nicaragua", "Níger", "Nigeria", "Noruega", "Nueva Zelanda", "Omán", "Países Bajos", "Pakistán", "Palaos", "Palestina", "Panamá", "Papúa Nueva Guinea", "Paraguay", "Perú", "Polonia", "Portugal", "Reino Unido", "República Centroafricana", "República Checa", "República de Macedonia", "República del Congo", "República Democrática del Congo", "República Dominicana", "República Sudafricana", "Ruanda", "Rumanía", "Rusia", "Samoa", "San Cristóbal y Nieves", "San Marino", "San Vicente y las Granadinas", "Santa Lucía", "Santo Tomé y Príncipe", "Senegal", "Serbia", "Seychelles", "Sierra Leona", "Singapur", "Siria", "Somalia", "Sri Lanka", "Suazilandia", "Sudán", "Sudán del Sur", "Suecia", "Suiza", "Surinam", "Tailandia", "Tanzania", "Tayikistán", "Timor Oriental", "Togo", "Tonga", "Trinidad y Tobago", "Túnez", "Turkmenistán", "Turquía", "Tuvalu", "Ucrania", "Uganda", "Uruguay", "Uzbekistán", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Yibuti", "Zambia", "Zimbabue");

     return $paises;
    
    }   
     public static function getPosiciones(){
    
    
        $posiciones = [
            'Portero',
            'Central',
            'Lateral',
            'Mediocentro',
            'Centrocampista',
            'Extremo',
            'Delantero'
        ];

        return $posiciones;


    }

    

     public static function getEquipos(){
    
    
        $equipos = [
            'Real Madrid',
            'Barcelona',
            'Betis',
            'Sevilla',
            'Valencia',
            'Rayo Vallecano',
            'Ath Bilbao',
            'Levante',
            'Real Sociedad',
            'Osasuna'
        ];

        return $equipos;

    }
    

     public static function getDatos(){

        //Jugadores

        $tabla[] = new Jugador(
            1,
            'Pele',
            15, 
            'España', 
            'F.C.Barcelona', 
            'portero',
            '5 temporadas'
        );


            $tabla[] = new Jugador(
                2,
                'Makelele', 
                12,
                'Argentina', 
                'Real Madrid', 
                'lateral',
                'Cedido'
            );


                $tabla[] = new Jugador(
                    3,
                'Jugador 3', 
                20,
                'Brasil', 
                'Real Betis', 
                'central',
                '8 temporadas'
            );

                asort($tabla);
                return $tabla;


     }

     public static function getEncabezado(){

   
        $encabezado = [
            'Id',
            'Nombre',
            'Num',
            'Pais',
            'Equipo',
            'Posiciones',
            'Contrato',
            'Acciones'
        ];

       
        return $encabezado;

    }
    
    


    # Devuelve el array con los nombres de las posiciones de un jugador
    public static function listaPosiciones($indicesPosiciones, $posiciones)
    {
        return ['portero', 'lateral', 'central'];
    }

}
