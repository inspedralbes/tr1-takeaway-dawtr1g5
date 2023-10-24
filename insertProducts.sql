INSERT INTO
    `genres` (
        `genre_name`,
        `created_at`,
        `updated_at`
    )
VALUES ('Pop', NULL, NULL), ('Hip Hop', NULL, NULL), ('Pop Rock', NULL, NULL), ('Rumba', NULL, NULL), ('Rock', NULL, NULL), ('Electrònica', NULL, NULL), ('Flamenc', NULL, NULL), ('R&B', NULL, NULL), ('Indie', NULL, NULL);

INSERT INTO types (type) VALUES ('CD'),('Vinyl');

INSERT INTO
    `products` (
        `id`,
        `name`,
        `artist`,
        `year`,
        `price`,
        `image`,
        `created_at`,
        `updated_at`,
        `genre_id`,
        `type_id`
    )
VALUES (
        1,
        'Starboy',
        'The Weeknd',
        '2016',
        10.99,
        NULL,
        NULL,
        NULL,
        1,
        2
    ), (
        2,
        'DAMN.',
        'Kendrick Lamar',
        '2017',
        12.99,
        NULL,
        NULL,
        NULL,
        2,
        2
    ), (
        3,
        'Hollywood\'s Bleeding',
        'Post Malone',
        '2019',
        11.99,
        NULL,
        NULL,
        NULL,
        1,
        2
    ), (
        4,
        'My Beautiful Dark Twisted Fantasy',
        'Kanye West',
        '2010',
        9.99,
        NULL,
        NULL,
        NULL,
        2,
        2
    ), (
        5,
        'Evolve',
        'Imagine Dragons',
        '2017',
        10.99,
        NULL,
        NULL,
        NULL,
        3,
        2
    ), (
        6,
        'Future Nostalgia',
        'Dua Lipa',
        '2020',
        11.99,
        NULL,
        NULL,
        NULL,
        1,
        2
    ), (
        7,
        'UTOPIA',
        'Travis Scott',
        '2023',
        13.99,
        NULL,
        NULL,
        NULL,
        2,
        2
    ), (
        8,
        'El Fary Grandes exitos',
        'El Fary',
        '1988',
        8.99,
        NULL,
        NULL,
        NULL,
        4,
        2
    ), (
        9,
        'Goodbye & Good Riddance',
        'Juice WRLD',
        '2018',
        10.99,
        NULL,
        NULL,
        NULL,
        2,
        2
    ), (
        10,
        'Trench',
        'Twenty One Pilots',
        '2018',
        10.99,
        NULL,
        NULL,
        NULL,
        1,
        2
    ), (
        11,
        'Favourite Worst Nightmare',
        'Arctic Monkeys',
        '2007',
        9.99,
        NULL,
        NULL,
        NULL,
        2,
        2
    ), (
        12,
        'Stories',
        'Avicii',
        '2015',
        9.99,
        NULL,
        NULL,
        NULL,
        6,
        2
    ), (
        13,
        'Changes',
        'Justin Bieber',
        '2020',
        11.99,
        NULL,
        NULL,
        NULL,
        1,
        2
    ), (
        14,
        'Luv is Rage 2',
        'Lil Uzi Vert',
        '2017',
        10.99,
        NULL,
        NULL,
        NULL,
        2,
        2
    ), (
        15,
        'Random Access Memories',
        'Daft Punk',
        '2013',
        12.99,
        NULL,
        NULL,
        NULL,
        6,
        2
    ), (
        16,
        'Flower Boy',
        'Tyler, the Creator',
        '2019',
        11.99,
        NULL,
        NULL,
        NULL,
        2,
        2
    ), (
        17,
        'i am > i was',
        '21 Savage',
        '2018',
        10.99,
        NULL,
        NULL,
        NULL,
        2,
        2
    ), (
        18,
        'Life after death',
        'The Notorious B.I.G',
        '1997',
        11.99,
        NULL,
        NULL,
        NULL,
        2,
        2
    ), (
        19,
        'Scary Monsters and Nice Spirits',
        'Skrillex',
        '2010',
        9.99,
        NULL,
        NULL,
        NULL,
        6,
        2
    ), (
        20,
        'The Fame',
        'Lady Gaga',
        '2008',
        11.99,
        NULL,
        NULL,
        NULL,
        1,
        2
    ), (
        21,
        'All Eyez on Me',
        '2Pac',
        '1996',
        11.99,
        NULL,
        NULL,
        NULL,
        2,
        2
    ), (
        22,
        'Cuéntame',
        'Rosario Flores',
        '2009',
        9.99,
        NULL,
        NULL,
        NULL,
        1,
        2
    ), (
        23,
        'Paradise Again',
        'Swedish House Mafia',
        '2022',
        12.99,
        NULL,
        NULL,
        NULL,
        6,
        2
    ), (
        24,
        'Diego el Cigala, Obras Maestras',
        'Diego el Cigala',
        '2023',
        13.99,
        NULL,
        NULL,
        NULL,
        7,
        2
    ), (
        25,
        'Clarity',
        'Zedd',
        '2012',
        10.99,
        NULL,
        NULL,
        NULL,
        6,
        2
    ), (
        26,
        'Man on the Moon: The End of Day',
        'Kid Cudi',
        '2009',
        9.99,
        NULL,
        NULL,
        NULL,
        2,
        2
    ), (
        27,
        'Blonde',
        'Frank Ocean',
        '2016',
        12.99,
        NULL,
        NULL,
        NULL,
        8,
        2
    ), (
        28,
        'Estopa',
        'Estopa',
        '1999',
        9.99,
        NULL,
        NULL,
        NULL,
        1,
        2
    ), (
        29,
        'Not All Heroes Wear Capes',
        'Metro Boomin',
        '2018',
        10.99,
        NULL,
        NULL,
        NULL,
        2,
        2
    ), (
        30,
        'Fall Out Boy',
        'American Beauty / American Psycho',
        '2015',
        11.99,
        NULL,
        NULL,
        NULL,
        9,
        2
    );