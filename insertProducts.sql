INSERT INTO
    `genres` (
        `genre_name`,
        `created_at`,
        `updated_at`
    )
VALUES ('Pop', NULL, NULL), ('Hip Hop', NULL, NULL), ('Pop Rock', NULL, NULL), ('Rumba', NULL, NULL), ('Rock', NULL, NULL), ('Electrònica', NULL, NULL), ('Flamenc', NULL, NULL), ('R&B', NULL, NULL), ('Indie', NULL, NULL);

INSERT INTO
    `products` (
        `id`,
        `name`,
        `artist`,
        `year`,
        `price`,
        `image`,
        `compositores`,
        `discografica`,
        `duracion`,
        `tracklist`,
        `created_at`,
        `updated_at`,
        `genre_id`
    )
VALUES (
        1,
        'Starboy',
        'The Weeknd',
        '2016',
        '10.99',
        0x696d672f53746172626f792e6a7067,
        'Abél \"The Weeknd\" Tesfaye, Ali Payami, Ali Shaheed Muhammad, Ben Billions, Benny Blanco, Bobby Raps, Cashmere Cat, Cirkut, Daft Punk, DaHeala, Daniel Wilson, Davinder Singh, Diplo, Doc McKinney, Frank Dukes, Jake One, Labrinth, Mano, Max Martin, Metro Boomin, Peter Svensson, Prince 85, Savan Kotecha, Sir Dylan',
        'XO, Republic',
        68,
        '1. Starboy (feat. Daft Punk) (3:50)\r\n2. Party Monster (4:09)\r\n3. False Alarm (3:40)\r\n4. Reminder (3:38)\r\n5. Rockin (3:52)\r\n6. Secrets (4:25)\r\n7. True Colors (3:26)\r\n8. Stargirl Interlude (feat. Lana Del Rey) (1:51)\r\n9. Sidewalks (feat. Kendrick Lamar) (3:51)\r\n10. Six Feet Under (3:57)\r\n11. Love to Lay (3:43)\r\n12. A Lonely Night (3:40)\r\n13. Attention (3:17)\r\n14. Ordinary Life (3:41)\r\n15. Nothing Without You (3:18)\r\n16. All I Know (feat. Future) (5:21)\r\n17. Die For You (4:20)\r\n18. I Feel It Coming (feat. Daft Punk) (4:29)',
        NULL,
        NULL,
        1
    ), (
        2,
        'DAMN.',
        'Kendrick Lamar',
        '2017',
        '12.99',
        0x696d672f44414d4e2e2e6a7067,
        'Dr. Dre, 9th Wonder, The Alchemist, BadBadNotGood, Cardo, DJ Dahi, Greg Kurstin, James Blake, Kuk Harrell, Mike WiLL Made-It',
        'Top Dawg, Aftermath, Interscope',
        55,
        '1. BLOOD. (1:58)\r\n2. DNA. (3:06)\r\n3. YAH. (2:40)\r\n4. ELEMENT. (3:29)\r\n5. FEEL. (3:35)\r\n6. LOYALTY. (feat. Rihanna) (3:47)\r\n7. PRIDE. (4:35)\r\n8. HUMBLE. (2:57)\r\n9. LUST. (5:07)\r\n10. LOVE. (feat. Zacari) (3:33)\r\n11. XXX. (feat. U2) (4:14)\r\n12. FEAR. (7:41)\r\n13. GOD. (4:09)\r\n14. DUCKWORTH. (4:09)',
        NULL,
        NULL,
        2
    ), (
        3,
        'Hollywood\'s Bleeding',
        'Post Malone',
        '2019',
        '11.99',
        0x696d672f486f6c6c79776f6f642d426c656564696e672e6a7067,
        'Andrew Watt, BloodPop, Brian Lee, Carter Lang, DJ Dahi, Emile Haynie, Frank Dukes, Happy Perez, Jahaan Sweet, Louis Bell Matt Tavares, Nick Mira, Post Malone, Wallis Lane',
        'Republic',
        51,
        '1. Hollywood\'s Bleeding (2:36)\r\n2. Saint-Tropez (2:30)\r\n3. Enemies (feat. DaBaby) (3:16)\r\n4. Allergic (2:36)\r\n5. A Thousand Bad Times (3:41)\r\n6. Circles (3:35)\r\n7. Die for Me (feat. Halsey y Future) (4:05)\r\n8. On the Road (feat. Meek Mill y Lil Baby) (3:38)\r\n9. Take What You Want (feat. Ozzy Osbourne y Travis Scott) (3:50)\r\n10. I\'m Gonna Be (2:20)\r\n11. Staring at the Sun (feat. SZA) (2:48)\r\n12. Sunflower (Spider-Man: Into the Spider-Verse) (2:38)\r\n13. Internet (2:03)\r\n14. Goodbyes (feat. Young Thug) (2:55)\r\n15. Myself (2:38)\r\n16. I Know (2:21)\r\n17. Wow (2:30)',
        NULL,
        NULL,
        1
    ), (
        4,
        'My Beautiful Dark Twisted Fantasy',
        'Kanye West',
        '2010',
        '9.99',
        0x696d672f59652e6a7067,
        'Kanye West, No I.D., RZA, DJ Premier, DJ Toomp, S1, Swizz Beatz, Mike Dean, Bink, Justin Vernon, Lex Luger',
        'Roc-A-Fella Records, Def Jam Recordings',
        68,
        '1. Dark Fantasy (4:40)\r\n2. Gorgeous (feat. Kid Cudi y Raekwon) (5:57)\r\n3. POWER (4:52)\r\n4. All of the Lights (Interlude) (1:02)\r\n5. All of the Lights (4:59)\r\n6. Monster (feat. Jay-Z, Rick Ross, Nicki Minaj y Bon Iver) (6:18)\r\n7. So Appalled (feat. Jay-Z, Pusha T, Cyhi the Prynce, Swizz Beatz y RZA) (6:38)\r\n8. Devil in a New Dress (feat. Rick Ross) (5:52)\r\n9. Runaway (feat. Pusha T) (9:08)\r\n10. Hell of a Life (5:27)\r\n11. Blame Game (feat. John Legend) (7:49)\r\n12. Lost in the World (4:16)\r\n13. Who Will Survive in America (1:38)',
        NULL,
        NULL,
        2
    ), (
        5,
        'Evolve',
        'Imagine Dragons',
        '2017',
        '10.99',
        0x696d672f45766f6c76652e6a7067,
        'Alex da Kid, Joel Little, Mattman & Robin, John Hill, Tim Randolph, Jayson DeZuzio',
        'Kidinakorner, Interscope',
        43,
        '1. I Don\'t Know Why (3:10)\r\n2. Whatever It Takes (3:21)\r\n3. Believer (3:24)\r\n4. Walking the Wire (3:52)\r\n5. Rise Up (3:51)\r\n6. I\'ll Make It Up to You (4:23)\r\n7. Yesterday (3:25)\r\n8. Mouth of the River (3:41)\r\n9. Thunder (3:07)\r\n10. Start Over (3:06)\r\n11. Dancing in the Dark (3:53)',
        NULL,
        NULL,
        3
    ), (
        6,
        'Future Nostalgia',
        'Dua Lipa',
        '2020',
        '11.99',
        0x696d672f4475612d4c6970612e6a7067,
        'Jeff Bhasker, Lorna Blackwood, Lauren D\'Elia, Danja, Jason Evigan, Ian Kirkpatrick, SG Lewis, Skylar Mones, The Monsters and the Strangerz, Stuart Price, Gian Stone, TMS y Watt',
        'Warner Records',
        37,
        '1. Future Nostalgia (3:04)\r\n2. Don\'t Start Now (3:03)\r\n3. Cool (3:29)\r\n4. Physical (3:13)\r\n5. Levitating (3:23)\r\n6. Pretty Please (3:15)\r\n7. Hallucinate (3:28)\r\n8. Love Again (4:18)\r\n9. Break My Heart (3:41)\r\n10. Good in Bed (3:38)\r\n11. Boys Will Be Boys (2:46)',
        NULL,
        NULL,
        1
    ), (
        7,
        'UTOPIA',
        'Travis Scott',
        '2023',
        '13.99',
        0x696d672f55746f7069612e6a7067,
        '30 Roc, Allen Ritter, Anthro, BNYX, Beyoncé, Boi-1da, BoogzDaBeast, Buddy Ross, Cadenza, Dez Wright, Dom Maker, DVLP, E*vax, FnZ, Guy-Manuel de Homem-Christo, Hit-Boy, Hoops, Hudson Mohawke, Illangelo, Jahaan Sweet, James Blake, John Mayer, Justin Vernon, Kanye West, Metro Boomin, Mike Dean, Nami, Nik Dean, Noah Goldstein, Oz, Pharrell Williams, Scotty Coleman, Sevn Thomas, Skeleton Carier, Slim Pharoah, The Alchemist, Tay Keith, Travis Sayles, Travis Scott, Vegyn, Vinylz, Wheezy, WondaGurl',
        'Cactus Jack, Epic',
        73,
        '1. Hyaena (3:42)\r\n2. Thank God (3:04)\r\n3. Modern Jam (feat. Teezo Touchdown) (4:15)\r\n4. My Eyes (4:11)\r\n5. God’s Country (2:07)\r\n6. Sirens (3:24)\r\n7. Meltdown (feat. Drake) (4:06)\r\n8. FE!N (feat. Playboy Carti) (3:11)\r\n9. Delresto (Echoes) (feat. Beyonce) (4:34)\r\n10. I Know? (3:31)\r\n11. Topia Twins (feat. Rob49 & 21savage) (3:43)\r\n12. Circus Maximus (feat. Swae Lee & The Weeknd) (4:18)\r\n13. Parasail (feat. Yung Lean & Dave Chapelle) (2:34)\r\n14. Skitzo (feat. Young Thug) (6:06)\r\n15. Lost Forever (feat. Westside Gunn) (2:43)\r\n16. Looove (feat. Kid Cudi) (3:46)\r\n17. KPop (feat. Bad Bunny & The Weeknd) (3:05)\r\n18. Telekinesis (feat. Future & SZA) (5:53)\r\n19. Til Further Notice (feat. 21 Savage & James Blake) (5:14)',
        NULL,
        NULL,
        2
    ), (
        8,
        'El Fary Grandes exitos',
        'El Fary',
        '1988',
        '8.99',
        0x696d672f656c2d466172792e6a7067,
        'El Fary',
        'Ariola',
        44,
        '1. Paloma Que Pierde El Vuelo\r\n2. Herido\r\n3. Amor Secreto\r\n4. la Cicatriz de Tu Amor\r\n5. El Toro Guapo\r\n6. Vivir A Mi Son\r\n7. Categoria\r\n8. Antoñete\r\n9. La Rompecorazones\r\n10. El Dinero\r\n11. Va Por Ellos\r\n12. Hoy Es Dia de Visita\r\n13. Mia Mia\r\n14. Ritmo Caló',
        NULL,
        NULL,
        4
    ), (
        9,
        'Goodbye & Good Riddance',
        'Juice WRLD',
        '2018',
        '10.99',
        0x696d672f4a756963652e6a7067,
        'Benny Blanco, Cardo, Cashmere Cat, CBMix, Dre Moon, Ghost Loft, JR Hitmaker, Mitch Mula, Nick Mira, Ric & Thadeus, Sidepce, Taz Taylor',
        'Grade A, Interscope',
        47,
        '1. Intro (1:12)\r\n2. All Girls Are the Same (2:45)\r\n3. Lucid Dreams (4:00)\r\n4. Lean Wit Me (2:55)\r\n5. Wasted (feat. Lil Uzi Vert) (4:18)\r\n6. I\'m Still (2:59)\r\n7. Betrayal (Skit) (0:23)\r\n8. Candles (3:05)\r\n9. Scared of Love (2:50)\r\n10. Used To (2:55)\r\n11. Karma (2:34)\r\n12. Hurt Me (2:16)\r\n13. Black & White (2:36)\r\n14. Long Gone (3:06)\r\n15. End of the Road (2:52)\r\n16. I\'ll Be Fine (2:41)\r\n17. End of the Road (2:52)',
        NULL,
        NULL,
        2
    ), (
        10,
        'Trench',
        'Twenty One Pilots',
        '2018',
        '10.99',
        0x696d672f5472656e63682e6a7067,
        'Tyler Joseph, Paul Meany',
        'Fueled by Ramen, Elektra',
        56,
        '1. Jumpsuit (3:58)\r\n2. Levitate (2:25)\r\n3. Morph (4:19)\r\n4. My Blood (3:49)\r\n5. Chlorine (5:24)\r\n6. Smithereens (2:57)\r\n7. Neon Gravestones (4:00)\r\n8. The Hype (4:24)\r\n9. Nico and the Niners (3:47)\r\n10. Cut My Lip (4:42)\r\n11. Bandito (5:31)\r\n12. Pet Cheetah (3:18)\r\n13. Legend (2:52)\r\n14. Leave the City (4:40)',
        NULL,
        NULL,
        1
    ), (
        11,
        'Favourite Worst Nightmare',
        'Arctic Monkeys',
        '2007',
        '9.99',
        0x696d672f41727469632e6a7067,
        'James Ford, Mike Crossey',
        'Domino, Warner Bros',
        37,
        '1. Brianstorm (2:50)\r\n2. Teddy Picker (2:43)\r\n3. D is for Dangerous (2:16)\r\n4. Balaclava (2:49)\r\n5. Fluorescent Adolescent (2:57)\r\n6. Only Ones Who Know (3:02)\r\n7. Do Me a Favour (3:27)\r\n8. This House is a Circus (3:09)\r\n9. If You Were There, Beware (4:34)\r\n10. The Bad Thing (2:23)\r\n11. Old Yellow Bricks (3:11)\r\n12. 505 (4:13)',
        NULL,
        NULL,
        2
    ), (
        12,
        'Stories',
        'Avicii',
        '2015',
        '9.99',
        0x696d672f53746f726965732e6a7067,
        'Tim Bergling, Salem Al Fakir, Alex Ebert, Carl Falk, Kristoffer Fogelmark, Martin Garrix, Dhani Lennevald, Albin Nedler, Vincent Pontare',
        'PRMD, Lava Records, Epic Records, Sony Music',
        62,
        '1. Waiting for Love (3:49)\r\n2. Talk to Myself (3:54)\r\n3. Touch Me (3:07)\r\n4. Ten More Days (4:05)\r\n5. For a Better Day (2:52)\r\n6. Broken Arrows (3:52)\r\n7. True Believer (4:48)\r\n8. City Lights (6:28)\r\n9. Pure Grinding (2:53)\r\n10. Sunset Jesus (4:24)\r\n11. Can\'t Catch Me (3:59)\r\n12. Somewhere in Stockholm (3:20)\r\n13. Trouble (2:47)\r\n14. Gonna Love Ya (3:34)',
        NULL,
        NULL,
        6
    ), (
        13,
        'Changes',
        'Justin Bieber',
        '2020',
        '11.99',
        0x696d672f4368616e6765732e6a7067,
        'Boi-1da, Cvre, Jahaan Sweet, Kid Culture, Poo Bear, Sasha Sitora, Vinylz',
        'Def Jam Recordings, RBMG Records',
        51,
        '1. All Around Me (2:15)\r\n2. Habitual (2:46)\r\n3. Come Around Me (2:29)\r\n4. Intentions (feat. Quavo) (3:33)\r\n5. Yummy (3:30)\r\n6. Available (3:15)\r\n7. Forever (feat. Post Malone & Clever) (3:40)\r\n8. Running Over (feat. Lil Dicky) (2:56)\r\n9. Take It Out on Me (2:56)\r\n10. Second Emotion (feat. Travis Scott) (2:32)\r\n11. Get Me (feat. Kehlani) (3:05)\r\n12. E.T.A. (2:41)\r\n13. Changes (2:17)\r\n14. Confirmation (2:50)\r\n15. That\'s What Love Is (2:39)\r\n16. At Least For Now (2:30)',
        NULL,
        NULL,
        1
    ), (
        14,
        'Luv is Rage 2 (Deluxe)',
        'Lil Uzi Vert',
        '2017',
        '10.99',
        0x696d672f6c696c2d757a692e6a7067,
        'Bobby Kritical, Cubeatz, D. Rich, DaHeala, DJ Plugg, Don Cannon, Honorable C.N.O.T.E., Ike Beatz, Illmind, JW Lucas, Lil Uzi Vert, Lyle LeDuff, Maaly Raw, Metro Boomin, Pharrell Williams, Pi\'erre Bourne, Rex Kudo, TM88, The Weeknd, WondaGurl',
        'Generation Now, Atlantic',
        69,
        '1. Two® (3:17)\r\n2. 444+222 (4:07)\r\n3. Sauce It Up (3:27)\r\n4. No Sleep Leak (4:07)\r\n5. The Way Life Goes (3:41)\r\n6. For Real (3:10)\r\n7. Feelings Mutual (2:53)\r\n8. Neon Guts (feat. Pharrell Williams) (4:25)\r\n9. Early 20 Rager (3:14)\r\n10. UnFazed (feat. The Weeknd) (3:11)\r\n11. Pretty Mami (3:46)\r\n12. How to Talk (3:29)\r\n13. X (2:49)\r\n14. Malfunction (3:01)\r\n15. Dark Queen (2:52)\r\n16. XO TOUR Llif3 (3:01)\r\n17. Skir Skirr (3:31)\r\n18. Loaded (3:41)\r\n19. Diamonds All on My Wrist (feat. Wiz Khalifa) (4:29)\r\n20. 20 Min (3:40)',
        NULL,
        NULL,
        2
    ), (
        15,
        'Random Access Memories',
        'Daft Punk',
        '2013',
        '12.99',
        0x696d672f52616e646f6d2d6163636573732d6d656d6f726965732e6a7067,
        'Thomas Bangalter, Guy-Manuel de Homem-Christo',
        'Columbia',
        74,
        '1. Give Life Back to Music (4:35)\r\n2. The Game of Love (5:21)\r\n3. Giorgio by Moroder (9:04)\r\n4. Within (3:49)\r\n5. Instant Crush (feat. Julian Casablancas) (5:37)\r\n6. Lose Yourself to Dance (5:53)\r\n7. Touch (8:18)\r\n8. Get Lucky (feat. Pharrell Williams) (6:10)\r\n9. Beyond (4:50)\r\n10. Motherboard (5:41)\r\n11. Fragments of Time (4:39)\r\n12. Doin\' It Right (5:07)\r\n13. Contact (6:21)',
        NULL,
        NULL,
        6
    ), (
        16,
        'Flower Boy',
        'Tyler, the Creator',
        '2019',
        '11.99',
        0x696d672f54796c65722e6a7067,
        'Tyler, the Creator',
        'Columbia',
        46,
        '1. Foreword (3:14)\r\n2. Where This Flower Blooms (feat. Frank Ocean) (3:14)\r\n3. Sometimes... (0:38)\r\n4. See You Again (feat. Kali Uchis) (3:00)\r\n5. Who Dat Boy (feat. A$AP Rocky) (3:25)\r\n6. Pothole (3:35)\r\n7. Garden Shed (feat. Estelle) (4:09)\r\n8. Boredom (5:20)\r\n9. I Ain\'t Got Time! (3:25)\r\n10. 911 / Mr. Lonely (feat. Frank Ocean and Steve Lacy) (4:15)\r\n11. Droppin\' Seeds (feat. Lil Wayne) (0:54)\r\n12. November (3:45)\r\n13. Glitter (3:45)\r\n14. Enjoy Right Now, Today (1:51)',
        NULL,
        NULL,
        2
    ), (
        17,
        'i am > i was',
        '21 Savage',
        '2018',
        '10.99',
        0x696d672f32317361766167652e6a7067,
        '30 Roc, Axlfolie, Cardo, Cubeatz, Dave Sava6e, DJ Dahi, Doughboy Beatz, FKi 1st, Freek Van Workum, ItsNicklus, Kid Hazel, Louis Bell, Metro Boomin, Nils Roselilah, Southside, Tiggi, TM88, Wheezy',
        'Slaughter Gang, Epic',
        51,
        '1. a lot (4:48)\r\n2. Break Da Law (2:59)\r\n3. A&T (3:32)\r\n4. Out for the Night (2:17)\r\n5. Gun Smoke (2:47)\r\n6. 1.5 (2:29)\r\n7. All My Friends (3:32)\r\n8. Can\'t Leave Without It (3:25)\r\n9. ASMR (2:52)\r\n10. Ball w/o You (3:15)\r\n11. Good Day (4:02)\r\n12. Pad Lock (2:48)\r\n13. Monster (3:53)\r\n14. Letter 2 My Momma (2:55)\r\n15. 4L (4:01)',
        NULL,
        NULL,
        2
    ), (
        18,
        'Life after death',
        'The Notorious B.I.G',
        '1997',
        '11.99',
        0x696d672f4269676769652e6a7067,
        'Sean \"Puffy\" Combs, Mark Pitts, the Notorious B.I.G., the Hitmen, Buckwild, Clark Kent, DJ Premier, Easy Mo Bee, Havoc, Daron Jones, KayGee, RZA',
        'Bad Boy, Artista',
        109,
        '1. Life After Death (Intro) (1:39)\r\n2. Somebody\'s Gotta Die (4:26)\r\n3. Hypnotize (3:49)\r\n4. Kick in the Door (4:46)\r\n5. #!*@ You Tonight (feat. R. Kelly) (5:43)\r\n6. Last Day (feat. The Lox) (4:19)\r\n7. I Love the Dough (feat. Jay-Z & Angela Winbush) (5:47)\r\n8. What\'s Beef? (5:15)\r\n9. B.I.G. (Interlude) (0:47)\r\n10. Mo Money Mo Problems (feat. Mase & Puff Daddy) (4:17)\r\n11. Niggas Bleed (4:51)\r\n12. I Got a Story to Tell (4:43)\r\n13. Notorious Thugs (feat. Bone Thugs-N-Harmony) (6:07)\r\n14. Miss U (4:59)\r\n15. Another (feat. Lil\' Kim) (4:15)\r\n16. Going Back to Cali (5:07)\r\n17. Ten Crack Commandments (3:24)\r\n18. Playa Hater (3:59)\r\n19. Nasty Boy (5:33)\r\n20. Sky\'s the Limit (feat. 112) (5:28)\r\n21. The World Is Filled... (feat. Too Short & Puff Daddy) (4:54)\r\n22. My Downfall (feat. DMC) (4:20)\r\n23. Long Kiss Goodnight (5:18)\r\n24. You\'re Nobody (Til Somebody Kills You) (4:53)',
        NULL,
        NULL,
        2
    ), (
        19,
        'Scary Monsters and Nice Spirits',
        'Skrillex',
        '2010',
        '9.99',
        0x696d672f536b72696c6c65782e6a7067,
        'Bare Noize, Foreign Beggars, Noisia, Skrillex, Zedd\r\n\r\n',
        'Big Beat, mau5trap\r\n\r\n',
        25,
        '1. Rock n\' Roll (Will Take You to the Mountain) (4:44)\r\n2. Scary Monsters and Nice Sprites (4:03)\r\n3. Kill Everybody (4:58)\r\n4. All I Ask of You (feat. Penny) (5:40)\r\n5. Scatta (feat. Bare Noize y Foreign Beggars) (3:56)\r\n6. With You, Friends (feat. Drive) (6:29)',
        NULL,
        NULL,
        6
    ), (
        20,
        'The Fame',
        'Lady Gaga',
        '2008',
        '11.99',
        0x696d672f5468652d46616d652e6a7067,
        'Brian & Josh, Rob Fusari, Martin Kierszenbaum, RedOne, Space, Cowboy',
        'Streamline, KonLive, Cherrytree, Interscope',
        84,
        '1. Just Dance (4:02)\r\n2. LoveGame (3:36)\r\n3. Paparazzi (3:28)\r\n4. Poker Face (3:58)\r\n5. Eh, Eh (Nothing Else I Can Say) (2:55)\r\n6. Beautiful, Dirty, Rich (2:54)\r\n7. The Fame (3:42)\r\n8. Money Honey (2:50)\r\n9. Starstruck (feat. Space Cowboy & Flo Rida) (3:37)\r\n10. Boys Boys Boys (3:22)\r\n11. Paper Gangsta (4:24)\r\n12. Brown Eyes (4:03)\r\n13. I Like It Rough (3:22)\r\n14. Summerboy (4:15)',
        NULL,
        NULL,
        1
    ), (
        21,
        'All Eyez on Me',
        '2Pac',
        '1996',
        '11.99',
        0x696d672f327061632e6a7067,
        'Suge Knight (exec.), 2Pac, DJ Bobcat, Dat Nigga Daz, DeVante Swing, DJ Pooh, DJ Quik, Doug Rasheed, Dr. Dre, Johnny \"J\", Mike Mosley, QDIII, Rick Rock',
        'Death Row, Interscope',
        132,
        '1. Ambitionz Az a Ridah (4:39)\r\n2. All About U (featuring Snoop Dogg, Nate Dogg, Dru Down, and Top Dogg) (4:37)\r\n3. Skandalouz (featuring Nate Dogg) (4:09)\r\n4. Got My Mind Made Up (featuring Daz 1. Dillinger, Kurupt, Redman, and Method Man) (5:13)\r\n5. How Do U Want It (featuring K-Ci and JoJo) (4:47)\r\n6. 2 of Amerikaz Most Wanted (featuring Snoop Dogg) (4:07)\r\n7. No More Pain (6:15)\r\n8. Heartz of Men (4:43)\r\n9. Life Goes On (5:02)\r\n10. Only God Can Judge Me (featuring Rappin\' 4-Tay) (4:57)\r\n11. Tradin War Stories (featuring C-Bo, Storm, and Dramacydal) (5:29)\r\n12. California Love (Remix) (featuring Dr. Dre and Roger Troutman) (6:25)\r\n13. I Ain\'t Mad at Cha (4:53)\r\n14. What\'z Ya Phone # (featuring Danny Boy) (5:09)\r\n15. Can\'t C Me (featuring George Clinton) (5:30)\r\n16. Shorty Wanna Be a Thug (3:51)\r\n17. Holla at Me (4:55)\r\n18. Wonda Why They Call U Bitch (4:20)\r\n19. When We Ride (featuring Outlaw Immortalz) (5:09)\r\n20. Thug Passion (featuring Jewell, Dramacydal, Storm, and Storm) (5:08)\r\n21. Picture Me Rollin\' (5:15)\r\n22. Check Out Time (featuring Kurupt and Syke) (4:39)\r\n23. Ratha Be Ya Nigga (featuring Richie Rich) (4:14)\r\n24. All Eyez on Me (featuring Big Syke) (5:08)\r\n25. Run tha Streetz (featuring Michel\'le, Storm, and Mutah) (5:17)\r\n26. Ain\'t Hard 2 Find (featuring E-40, B-Legit, C-Bo, and Richie Rich) (4:29)\r\n27. Heaven Ain\'t Hard 2 Find (3:58)',
        NULL,
        NULL,
        2
    ), (
        22,
        'Cuéntame',
        'Rosario Flores',
        '2009',
        '9.99',
        0x696d672f526f736172696f2e6a7067,
        'Rosario Flores',
        'Ariola',
        39,
        '1. Cuéntame que te pasó (3:24)\r\n2. Soy rebelde (3:03)\r\n3. Il mio canto libero (3:29)\r\n4. Pongamos que hablo de Madrid (3:20)\r\n5. Gracias a la vida (3:44)\r\n6. La gata bajo la lluvia (3:10)\r\n7. Gwendolyne (2:35)\r\n8. Quiero besarte (3:34)\r\n9. El gato que esta triste y azul (3:09)\r\n10. Todo es de color (3:56)\r\n11. Todo cambia (3:22)\r\n12. Cuéntame (2:15)',
        NULL,
        NULL,
        1
    ), (
        23,
        'Paradise Again',
        'Swedish House Mafia',
        '2022',
        '12.99',
        0x696d672f50617261646973652d616761696e2e6a7067,
        'Desembra, Dice of Nights, Fred Again, Jacob Mühlrad, Killen Manjaro, Klahr, Krash, Lord Flacko, Magnus Lidehäll, Parisi, Swedish House Mafia, Vargas & Lagola',
        'SSA, Republic',
        62,
        '1. Time (feat. Mapei) (4:41)\r\n2. Heaven Takes You Home (feat. Connie Constance) (3:34)\r\n3. Jacob\'s Note (feat. Jacob Mühlrad) (1:04)\r\n4. Moth to a Flame (feat. The Weeknd) (3:54)\r\n5. Mafia (3:34)\r\n6. Frankenstein (feat. A$AP Rocky) (3:27)\r\n7. Don\'t Go Mad (feat. Seinabo Sey) (4:24)\r\n8. Paradise Again (3:35)\r\n9. Lifetime (feat. Ty Dolla $ign & 070 Shake) (3:06)\r\n10. Calling On (4:35)\r\n11. Home (3:44)\r\n12. It Gets Better (3:04)\r\n13. Redlight (feat. Sting) (4:02)\r\n14. Can U Feel It (4:23)\r\n15. 19.30 (1:57)\r\n16. Another Minute (3:27)\r\n17. For You (5:22)',
        NULL,
        NULL,
        6
    ), (
        24,
        'Diego el Cigala, Obras Maestras',
        'Diego el Cigala',
        '2023',
        '13.99',
        0x696d672f656c2d436967616c612e6a7067,
        'Diego el Cigala',
        'Sony Music Latin',
        36,
        '1. Ay Cariño (3:50)\r\n2. Sin Un Amor (3:01)\r\n3. Adoro (4:12)\r\n4. Abrázame (3:41)\r\n5. Desahogo (4:20)\r\n6. Toda Una Vida (2:24)\r\n7. Espérame en el Cielo (3:06)\r\n8. Piensa En Mí (3:13)\r\n9. Voy (3:21)\r\n10. Todos Vuelven (5:03)',
        NULL,
        NULL,
        7
    ), (
        25,
        'Clarity',
        'Zedd',
        '2012',
        '10.99',
        0x696d672f436c61726974792e6a7067,
        'Zedd, Lucky Date',
        'Interscope',
        45,
        '1. Hourglass (feat. LIZ) (4:11)\r\n2. Shave It Up (3:10)\r\n3. Spectrum (feat. Matthew Koma) (4:03)\r\n4. Lost at Sea (feat. Ryan Tedder) (3:45)\r\n5. Clarity (feat. Foxes) (4:31)\r\n6. Codec (5:02)\r\n7. Stache (4:05)\r\n8. Fall into the Sky (with Lucky Date feat. Ellie Goulding) (3:37)\r\n9. Follow You Down (feat. Bright Lights) (3:35)\r\n10. Epos (5:44)',
        NULL,
        NULL,
        6
    ), (
        26,
        'Man on the Moon: The End of Day',
        'Kid Cudi',
        '2009',
        '9.99',
        0x696d672f4b69642d4b7564692e6a7067,
        'Crada, Dot da Genius, Emile Haynie, Free School, Jeff Bhasker, Kanye West, The Kickdrums, Matt Friedman, Plain Pat, Ratatat',
        'Dream On, GOOD, Universal, Motown',
        58,
        '1. In My Dreams (Cudder Anthem) (3:19)\r\n2. Soundtrack 2 My Life (3:55)\r\n3. Simple As... (2:31)\r\n4. Solo Dolo (Nightmare) (4:26)\r\n5. Heart of a Lion (Kid Cudi Theme Music) (2:52)\r\n6. My World (feat. Billy Cravens) (4:03)\r\n7. Day \'N\' Nite (Nightmare) (3:41)\r\n8. Sky Might Fall (3:41)\r\n9. Enter Galactic (Love Connection Part I) (4:20)\r\n10. Alive (Nightmare) (4:07)\r\n11. Cudi Zone (4:19)\r\n12. Make Her Say (feat. Kanye West & Common) (3:36)\r\n13. Pursuit of Happiness (Nightmare) (4:55)\r\n14. Hyyerr (feat. Chip Tha Ripper) (3:32)\r\n15. Up Up & Away (3:47)',
        NULL,
        NULL,
        2
    ), (
        27,
        'Blonde',
        'Frank Ocean',
        '2016',
        '12.99',
        0x696d672f426c6f6e64652e6a7067,
        'Buddy Ross, Frank Ocean, Francis Starlite, James Blake, Jon Brion, Joe Thornalley, Malay Ho, Michael Uzowuru, Om\'Mas Keith, Pharrell Williams, Rostam Batmanglij',
        'Boys Don\'t Cry',
        60,
        '1. Nikes (5:13)\r\n2. Ivy (4:09)\r\n3. Pink + White (3:04)\r\n4. Be Yourself (0:32)\r\n5. Solo (4:17)\r\n6. Skyline To (3:05)\r\n7. Self Control (4:09)\r\n8. Good Guy (1:06)\r\n9. Nights (5:07)\r\n10. Solo (Reprise) (2:19)\r\n11. Pretty Sweet (2:38)\r\n12. Facebook Story (0:49)\r\n13. Close to You (1:26)\r\n14. White Ferrari (4:08)\r\n15. Seigfried (5:34)\r\n16. Godspeed (2:59)\r\n17. Futura Free (9:24)',
        NULL,
        NULL,
        8
    ), (
        28,
        'Estopa',
        'Estopa',
        '1999',
        '9.99',
        0x696d672f4573746f70612e6a7067,
        'Sergio Castillo',
        'Sony/BMG',
        40,
        '1. Tu Calorro (3:10)\r\n2. Por la Raja de tu Falda (3:22)\r\n3. Me Falta el Aliento (3:38)\r\n4. Tan Solo (4:30)\r\n5. Poquito a Poco (3:02)\r\n6. Suma y Sigue (3:14)\r\n7. El del Medio de los Chichos (3:47)\r\n8. Como Camarón (3:22)\r\n9. Exiliado en el Lavabo (3:15)\r\n10. Estopa (3:35)\r\n11. Cacho a Cacho (2:28)\r\n12. Bossanova (3:16)',
        NULL,
        NULL,
        1
    ), (
        29,
        'Not All Heroes Wear Capes',
        'Metro Boomin',
        '2018',
        '10.99',
        0x696d672f4d6574726f2d426f6f6d696e2e6a7067,
        'Metro Boomin, Allen Ritter, Chopsquad DJ, Dre Moon, Milan Beker, Prince 85, Southside, Tay Keith, Wheezy',
        'Boominati, Republic',
        87,
        '1. 10AM / Save the World (feat. Gucci Mane) (3:47)\r\n2. Overdue (feat. Travis Scott) (3:57)\r\n3. Don\'t Come Out the House (with 21 Savage) (4:09)\r\n4. Dreamcatcher (feat. Swae Lee & Travis Scott) (3:08)\r\n5. Space Cadet (with Gunna) (3:30)\r\n6. 10 Freaky Girls (with 21 Savage) (3:29)\r\n7. Up to Something (feat. Travis Scott & Young Thug) (3:23)\r\n8. Only 1 (Interlude) (1:20)\r\n9. Lesbian (feat. Gunna & Young Thug) (2:46)\r\n10. Borrowed Love (feat. Swae Lee & WizKid) (3:41)\r\n11. Only You (feat. WizKid, Offset & J Balvin) (3:33)\r\n12. No More (feat. Travis Scott, Kodak Black & 21 Savage) (4:47)\r\n13. No Complaints (with Offset & Drake) (4:21)',
        NULL,
        NULL,
        2
    ), (
        30,
        'American Beauty / American Psycho',
        'Fall Out Boy',
        '2015',
        '11.99',
        0x696d672f416d65726963616e2e6a7067,
        'Jake Sinclair, Butch Walker, J.R. Rotem, Omega, SebastiAn, Young Wolf Hatchlings',
        'Island, DCD2',
        39,
        '1. Irresistible (3:26)\r\n2. American Beauty/American Psycho (3:15)\r\n3. Centuries (3:48)\r\n4. The Kids Aren\'t Alright (4:20)\r\n5. Uma Thurman (3:31)\r\n6. Jet Pack Blues (2:59)\r\n7. Novocaine (3:46)\r\n8. Fourth Of July (3:44)\r\n9. Favourite Record (3:23)\r\n10. Immortals (3:09)\r\n11. Twin Skeleton\'s (Hotel In NYC) (3:40)',
        NULL,
        NULL,
        9
    );