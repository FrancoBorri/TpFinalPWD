<?php
declare(strict_types=1);

use App\Config\Migrator;

class AddNotice extends Migrator
{
    public string $table = 'notices';

    public function up(): void
    {
        $sql = "INSERT INTO $this->table (title,author,content,image) 
        VALUES 
            ('Avengers: Endgame Rompe Récords de Taquilla', 'Juan Pérez', 'Avengers: Endgame se ha convertido en la película más taquillera de todos los tiempos, superando a Avatar. Los fans de todo el mundo están celebrando este logro.', 'https://lumiere-a.akamaihd.net/v1/images/eu_disneyplus_avengers-endgame_mob_m_928f44f1.jpeg'),
            ('Joker Gana Múltiples Premios', 'Ana Gómez', 'Joker, dirigida por Todd Phillips, ha ganado múltiples premios incluyendo Mejor Actor para Joaquin Phoenix. La película ha sido elogiada por su representación oscura y cruda del icónico personaje.','https://pics.filmaffinity.com/joker-790658206-mmed.jpg'),
            ('Parásitos Hace Historia en los Oscars', 'María López', 'Parásitos de Bong Joon Ho hizo historia al convertirse en la primera película en idioma no inglés en ganar el premio a Mejor Película en los Oscars. También ganó Mejor Director, Mejor Guión Original y Mejor Película Internacional.', 'https://es.web.img3.acsta.net/pictures/19/09/17/17/13/3740579.jpg'),
            ('1917: Una Obra Maestra Cinematográfica', 'Roberto García', '1917 de Sam Mendes está siendo aclamada como una obra maestra cinematográfica. La película, filmada para parecer un solo plano secuencia, sumerge a los espectadores en las experiencias desgarradoras de dos jóvenes soldados durante la Primera Guerra Mundial.', 'https://es.web.img3.acsta.net/pictures/20/01/09/15/10/0234685.jpg'),
            ('Spider-Man: No Way Home Rompe Internet', 'Carlos Martínez', 'El lanzamiento del tráiler de Spider-Man: No Way Home ha roto internet. Los fans están anticipando el regreso de caras familiares y la introducción del multiverso.', 'https://image.api.playstation.com/vulcan/ap/rnd/202008/1020/T45iRN1bhiWcJUzST6UFGBvO.png'),
            ('Dune: Un Espectáculo Visual', 'Diana Ramírez', 'Dune de Denis Villeneuve ha sido elogiada por sus impresionantes visuales y adaptación fiel de la novela clásica de Frank Herbert. Se espera que la película sea un gran contendiente en la próxima temporada de premios.', 'https://pics.filmaffinity.com/dune-209834814-mmed.jpg'),
            ('Sin Tiempo Para Morir: La Última Película de Bond de Daniel Craig', 'Eduardo Fernández', 'Sin Tiempo Para Morir marca la última aparición de Daniel Craig como James Bond. La película ofrece acción, drama y emoción, proporcionando una conclusión adecuada a la carrera de Craig como 007.', 'https://es.web.img3.acsta.net/pictures/21/09/09/10/40/0885856.jpg'),
            ('Tenet: El Thriller Desafiante de Christopher Nolan', 'Fernanda López', 'Tenet de Christopher Nolan es un thriller desafiante que explora el concepto de inversión temporal. La película ha sido aclamada por su narrativa ambiciosa y secuencias de acción innovadoras.', 'https://m.media-amazon.com/images/M/MV5BMzU3YWYwNTQtZTdiMC00NjY5LTlmMTMtZDFlYTEyODBjMTk5XkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_FMjpg_UX1000_.jpg'),
            ('The Batman: Un Reinicio Oscuro y Crudo', 'Gustavo Sánchez', 'The Batman de Matt Reeves promete ser un reinicio oscuro y crudo del icónico superhéroe. Protagonizada por Robert Pattinson como Bruce Wayne, la película explora los primeros años de la carrera de lucha contra el crimen de Batman.', 'https://pics.filmaffinity.com/The_Batman-449856406-large.jpg'),
            ('Viuda Negra: Una Largamente Esperada Película Independiente', 'Helena Gutiérrez', 'Viuda Negra finalmente le da a Natasha Romanoff su largamente esperada película independiente. La película profundiza en su pasado e introduce nuevos personajes que jugarán roles significativos en el futuro del MCU.', 'https://es.web.img3.acsta.net/pictures/20/03/09/18/28/5915477.jpg')
        ;";
        $this->run($sql);
    }

    public function down(): void
    {
        $sql = "TRUNCATE TABLE $this->table;";
        $this->run($sql);
    }


}