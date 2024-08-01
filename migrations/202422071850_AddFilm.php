<?php
declare(strict_types=1);

use App\Config\Migrator;

class AddFilm extends Migrator
{
    public string $table = 'films';

    public function up(): void
    {
        $sql = "INSERT INTO $this->table (title, director, gender, release_date, link, image) VALUES 
            ('The Shawshank Redemption', 'Frank Darabont', 'Drama', '1994-09-22', 'https://www.youtube.com/watch?v=_znb1cUiQP8', 'https://static.wikia.nocookie.net/doblaje/images/5/56/The-Shawshank-Redemption-Latino1994.jpg/revision/latest?cb=20240224231124&path-prefix=es'),
            ('The Godfather', 'Francis Ford Coppola', 'Crime, Drama', '1972-03-24', 'https://www.youtube.com/watch?v=iOyQx7MXaz0', 'https://m.media-amazon.com/images/M/MV5BM2MyNjYxNmUtYTAwNi00MTYxLWJmNWYtYzZlODY3ZTk3OTFlXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_.jpg'),
            ('The Dark Knight', 'Christopher Nolan', 'Action, Crime, Drama', '2008-07-18', 'https://www.youtube.com/watch?v=c_BZOsbX3MI', 'https://m.media-amazon.com/images/S/pv-target-images/e9a43e647b2ca70e75a3c0af046c4dfdcd712380889779cbdc2c57d94ab63902.jpg'),
            ('Pulp Fiction', 'Quentin Tarantino', 'Crime, Drama', '1994-10-14', 'https://www.youtube.com/watch?v=r-PSxjTR174', 'https://musicart.xboxlive.com/7/767c6300-0000-0000-0000-000000000002/504/image.jpg?w=1920&h=1080'),
            ('Forrest Gump', 'Robert Zemeckis', 'Drama, Romance', '1994-07-06', 'https://www.youtube.com/watch?v=GIs2gpWpBiQ', 'https://static0.moviewebimages.com/wordpress/wp-content/uploads/movie/uurFOHjSg0ZRNgDZ8sNvhAyG5SUr4b.jpg'),
            ('Gladiator', 'Ridley Scott', 'Action, Adventure, Drama', '2000-05-05', 'https://www.youtube.com/watch?v=W3xjHIdaGww', 'https://m.media-amazon.com/images/M/MV5BMDliMmNhNDEtODUyOS00MjNlLTgxODEtN2U3NzIxMGVkZTA1L2ltYWdlXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_.jpg'),
            ('Titanic', 'James Cameron', 'Drama, Romance', '1997-12-19', 'https://www.youtube.com/watch?v=FiRVcExwBVA', 'https://pics.filmaffinity.com/titanic-321994924-mmed.jpg'),
            ('Jurassic Park', 'Steven Spielberg', 'Action, Adventure, Sci-Fi', '1993-06-11', 'https://www.youtube.com/watch?v=lc0UehYemQA', 'https://mir-s3-cdn-cf.behance.net/project_modules/hd/f00bf346385235.58520f9022451.jpg'),
            ('Interstellar', 'Christopher Nolan', 'Adventure, Drama, Sci-Fi', '2014-11-07', 'https://www.youtube.com/watch?v=UoSSbmD9vqc', 'https://m.media-amazon.com/images/M/MV5BZjdkOTU3MDktN2IxOS00OGEyLWFmMjktY2FiMmZkNWIyODZiXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_.jpg'),
            ('Avengers: Endgame', 'Anthony Russo, Joe Russo', 'Action, Adventure, Drama', '2019-04-26', 'https://www.youtube.com/watch?v=siQ8_HTzNaM', 'https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_.jpg'),
            ('Joker', 'Todd Phillips', 'Crime, Drama, Thriller', '2019-10-04', 'https://www.youtube.com/watch?v=ZMH8NWf9btw', 'https://pics.filmaffinity.com/joker-790658206-mmed.jpg'),
            ('Parasite', 'Bong Joon Ho', 'Comedy, Drama, Thriller', '2019-05-30', 'https://www.youtube.com/watch?v=90dWVETAdtI', 'https://m.media-amazon.com/images/M/MV5BYWZjMjk3ZTItODQ2ZC00NTY5LWE0ZDYtZTI3MjcwN2Q5NTVkXkEyXkFqcGdeQXVyODk4OTc3MTY@._V1_.jpg'),
            ('1917', 'Sam Mendes', 'Drama, War', '2019-12-25', 'https://www.youtube.com/watch?v=YrbdN5zaouU', 'https://es.web.img3.acsta.net/pictures/20/01/09/15/10/0234685.jpg'),
            ('Spider-Man: No Way Home', 'Jon Watts', 'Action, Adventure, Fantasy', '2021-12-17', 'https://www.youtube.com/watch?v=8nNa5A_MRBU', 'https://image.api.playstation.com/vulcan/ap/rnd/202008/1020/T45iRN1bhiWcJUzST6UFGBvO.png'),
            ('Dune', 'Denis Villeneuve', 'Action, Adventure, Drama', '2021-10-22', 'https://www.youtube.com/watch?v=ndStFxq8zfU', 'https://legrandcontinent.eu/es/wp-content/uploads/sites/2/2024/03/5392835.jpg'),
            ('No Time to Die', 'Cary Joji Fukunaga', 'Action, Adventure, Thriller', '2021-10-08', 'https://www.youtube.com/watch?v=bx9DZ9gDmeo','https://m.media-amazon.com/images/M/MV5BYWQ2NzQ1NjktMzNkNS00MGY1LTgwMmMtYTllYTI5YzNmMmE0XkEyXkFqcGdeQXVyMjM4NTM5NDY@._V1_.jpg'),
            ('Tenet', 'Christopher Nolan', 'Action, Sci-Fi, Thriller', '2020-08-26', 'https://www.youtube.com/watch?v=eZXnSVUif60', 'https://static.wikia.nocookie.net/doblaje/images/b/b9/Tenet.jpg/revision/latest?cb=20200916003552&path-prefix=es'),
            ('The Batman', 'Matt Reeves', 'Action, Crime, Drama', '2022-03-04', 'https://www.youtube.com/watch?v=cFZbgCGI9P0', 'https://pics.filmaffinity.com/The_Batman-449856406-large.jpg'),
            ('Black Widow', 'Cate Shortland', 'Action, Adventure, Sci-Fi', '2021-07-09', 'https://www.youtube.com/watch?v=HlB_8y3cmUg', 'https://m.media-amazon.com/images/M/MV5BNjRmNDI5MjMtMmFhZi00YzcwLWI4ZGItMGI2MjI0N2Q3YmIwXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg'),
            ('The Suicide Squad', 'James Gunn', 'Action, Adventure, Comedy', '2021-08-06', 'https://www.youtube.com/watch?v=hZP6bAni_kc','https://m.media-amazon.com/images/M/MV5BNzUzMjkxMzItMTc0MS00MjAxLWFiZGMtY2YwOGM2Yjk1ZjBmXkEyXkFqcGdeQXVyODIyOTEyMzY@._V1_FMjpg_UX1000_.jpg'),
            ('Shang-Chi and the Legend of the Ten Rings', 'Destin Daniel Cretton', 'Action, Adventure, Fantasy', '2021-09-03', 'https://www.youtube.com/watch?v=zuBioY7-mpM','https://m.media-amazon.com/images/M/MV5BNTliYjlkNDQtMjFlNS00NjgzLWFmMWEtYmM2Mzc2Zjg3ZjEyXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg'),
            ('Eternals', 'Chloé Zhao', 'Action, Adventure, Drama', '2021-11-05', 'https://www.youtube.com/watch?v=v1EkoQV4g5c', 'https://play-lh.googleusercontent.com/1-I04OXQ497bGWuQuYt02SgsD1PcJDSBM7saPyfht2H2QvUjxKju0byrcjisT7eua1Mh0fy4j0YU-F91iQs'),
            ('The Matrix Resurrections', 'Lana Wachowski', 'Action, Sci-Fi', '2021-12-22', 'https://www.youtube.com/watch?v=8WJFLNMWNmg', 'https://m.media-amazon.com/images/M/MV5BMGJkNDJlZWUtOGM1Ny00YjNkLThiM2QtY2ZjMzQxMTIxNWNmXkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_FMjpg_UX1000_.jpg'),
            ('Free Guy', 'Shawn Levy', 'Action, Adventure, Comedy', '2021-08-13', 'https://www.youtube.com/watch?v=XHTgyuBQ99Q', 'https://m.media-amazon.com/images/M/MV5BOTY2NzFjODctOWUzMC00MGZhLTlhNjMtM2Y2ODBiNGY1ZWRiXkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_.jpg'),
            ('Luca', 'Enrico Casarosa', 'Animation, Adventure, Comedy', '2021-06-18', 'https://www.youtube.com/watch?v=EJk_Z-OasXc', 'https://static.wikia.nocookie.net/disney/images/0/08/Lucaposter.jpg/revision/latest?cb=20211029232739&path-prefix=es'),
            ('Soul', 'Pete Docter, Kemp Powers', 'Animation, Adventure, Comedy', '2020-12-25', 'https://www.youtube.com/watch?v=3QIdlo4uIVg', 'https://m.media-amazon.com/images/S/pv-target-images/cd9515c0dbde3d7bf54406285fb8c6c209aeefca3a3cd371675cd8a817b850ab.jpg'),
            ('Wonder Woman 1984', 'Patty Jenkins', 'Action, Adventure, Fantasy', '2020-12-25', 'https://www.youtube.com/watch?v=5V_1p_Bk6Wg', 'https://m.media-amazon.com/images/M/MV5BYTlhNzJjYzYtNGU3My00ZDI5LTgzZDUtYzllYjU1ZmU0YTgwXkEyXkFqcGdeQXVyMjQwMDg0Ng@@._V1_.jpg'),
            ('Mortal Kombat', 'Simon McQuoid', 'Action, Adventure, Fantasy', '2021-04-23', 'https://www.youtube.com/watch?v=Y2O4RCdwCGM', 'https://sm.ign.com/t/ign_es/movie/m/mortal-kom/mortal-kombat-reboot_ux3z.300.jpg'),
            ('Raya and the Last Dragon', 'Don Hall, Carlos López Estrada', 'Animation, Action, Adventure', '2021-03-05', 'https://www.youtube.com/watch?v=hTh2-WnW1RI','https://m.media-amazon.com/images/M/MV5BZWNiOTc4NGItNGY4YS00ZGNkLThkOWEtMDE2ODcxODEwNjkwXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg'),
            ('Cruella', 'Craig Gillespie', 'Comedy, Crime', '2021-05-28', 'https://www.youtube.com/watch?v=oK13SZYZqmA', 'https://m.media-amazon.com/images/M/MV5BOWI5YTUxOWEtZmRiZS00ZmQxLWE2NzctYTRiODA2NzE1ZjczXkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_.jpg');";
        $this->run($sql);
    }

}