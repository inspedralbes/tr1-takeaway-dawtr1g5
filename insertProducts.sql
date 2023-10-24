INSERT INTO `genres` (`genre_name`, `created_at`, `updated_at`) VALUES
('Pop', NULL, NULL),
('Hip Hop', NULL, NULL),
('Pop Rock', NULL, NULL),
('Rumba', NULL, NULL),
('Rock', NULL, NULL),
('Electrònica', NULL, NULL),
('Flamenc', NULL, NULL),
('R&B', NULL, NULL),
('Indie', NULL, NULL);


INSERT INTO types (type) VALUES ('cd'),('vinyl');

INSERT INTO products (name, artist, year, genre_id, photo, type)
VALUES 
('Starboy', 'The Weeknd', 2016, 1, NULL, '1'),
('DAMN.', 'Kendrick Lamar', 2017, 2, NULL, '1'),
('Hollywood''s Bleeding', 'Post Malone', 2019, 1, NULL, '1'),
('My Beautiful Dark Twisted Fantasy', 'Kanye West', 2010, 2, NULL, '1'),
('Evolve', 'Imagine Dragons', 2017, 3, NULL, '1'),
('Future Nostalgia', 'Dua Lipa', 2020, 1, NULL, '1'),
('UTOPIA', 'Travis Scott', 2023, 2, NULL, '1'),
('El Fary Grandes exitos', 'El Fary', 1988, 4, NULL, '1'),
('Goodbye & Good Riddance', 'Juice WRLD', 2018, 2, NULL, '1'),
('Trench', 'Twenty One Pilots', 2018, 1, NULL, '1'),
('Favourite Worst Nightmare', 'Arctic Monkeys', 2007, 2, NULL, '1'),
('Stories', 'Avicii', 2015, 6, NULL, '1'),
('Changes', 'Justin Bieber', 2020, 1, NULL, '1'),
('Luv is Rage 2', 'Lil Uzi Vert', 2017, 2, NULL, '1'),
('Random Access Memories', 'Daft Punk', 2013, 6, NULL, '1'),
('Flower Boy', 'Tyler, the Creator', 2019, 2, NULL, '1'),
('i am > i was', '21 Savage', 2018, 2, NULL, '1'),
('Life after death', 'The Notorious B.I.G', 1997, 2, NULL, '1'),
('Scary Monsters and Nice Spirits', 'Skrillex', 2010, 6, NULL, '1'),
('The Fame', 'Lady Gaga', 2008, 1, NULL, '1'),
('All Eyez on Me', '2Pac', 1996, 2, NULL, '1'),
('Cuéntame', 'Rosario Flores', 2009, 1, NULL, '1'),
('Paradise Again', 'Swedish House Mafia', 2022, 6, NULL, '1'),
('Diego el Cigala, Obras Maestras', 'Diego el Cigala', 2023, 7, NULL, '1'),
('Clarity', 'Zedd', 2012, 6, NULL, '1'),
('Man on the Moon: The End of Day', 'Kid Cudi', 2009, 2, NULL, '1'),
('Blonde', 'Frank Ocean', 2016, 8, NULL, '1'),
('Estopa', 'Estopa', 1999, 1, NULL, '1'),
('Not All Heroes Wear Capes', 'Metro Boomin', 2018, 2, NULL, '1'),
('Fall Out Boy', 'American Beauty / American Psycho', 2015, 9, NULL, '1');