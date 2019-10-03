#!/usr/bin/php
<?PHP

include 'database.php';

print('U/N: ' . $DB_USER . PHP_EOL . 'P/W: ' . $DB_PASS . PHP_EOL);
$connection = new PDO($DB_SHORTCUT, $DB_USER, $DB_PASS, $options);

$connection->exec("INSERT 
				INTO
					tags (tag)
				VALUES
					('Alternative Music'), ('Blues'), ('Classical Music'), ('Country Music'),
					('Dance Music'), ('Easy Listening'), ('Electronic Music'),
					('European Music (Folk / Pop)'), ('Hip Hop / Rap'), ('Indie Pop'),
					('Inspirational (incl. Gospel)'), ('Asian Pop (J-Pop, K-pop)'), ('Jazz'),
					('Latin Music'), ('New Age'), ('Opera'), ('Pop (Popular music)'),
					('R&B / Soul'), ('Reggae'), ('Rock'), ('Singer / Songwriter (inc. Folk)'),
					('World Music / Beats'), ('Absurdist/surreal/whimsical'), ('Action'),
					('Adventure'), ('Comedy'), ('Crime'), ('Drama'), ('Fantasy'), ('Historical'),
					('Historical fiction'), ('Horror'), ('Magical realism'), ('Mystery'),
					('Paranoid Fiction'), ('Philosophical'), ('Political'), ('Romance'),
					('Saga'), ('Satire'), ('Science fiction'), ('Social'), ('Speculative'),
					('Thriller'), ('Urban'), ('Western'), ('JavaScript'), ('SQL'), ('Java'),
					('C#'), ('Python'), ('PHP'), ('C++'), ('C'), ('TypeScript'), ('Ruby'),
					('Swift'), ('Objective-C'), ('VB.NET'), ('Assembly'), ('R'), ('Perl'),
					('VBA'), ('Matlab'), ('Go'), ('Scala'), ('Groovy'), ('CoffeScript'),
					('Visual Basic 6'), ('Lua'), ('Haskell'), ('AngularJS'), ('HTML5'),
					('CSS3'), ('Ruby On Rails'), ('Node.js'), ('.NET Core'), ('React'),
					('Cordova'), ('Firebase'), ('Xamarin'), ('Hadoop'), ('Spark'),
					('MySQL'), ('SQL Server'), ('SQLite'), ('PostgreSQL'), ('MongoDB'),
					('Oracle'), ('Redis'), ('Equal=Test'), ('Ampersand&Test'), ('Cassandra')
");

print('Tags created' . PHP_EOL);

$connection->exec("INSERT INTO
						users(username, first_name, last_name, email, password, active, token)
					VALUES
						('admin', 'Admin', 'De', 'oles@gmail.com', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 1, 'djfjfjfjfjfjfjfj')");

print('Added admin user' . PHP_EOL);

$connection->exec("INSERT INTO 
						user_action(first_user, second_user, matched)
					VALUES
						(1, 3, 'match'),
						(1, 5, 'match'),
						(1, 13, 'match'),
						(3, 1, 'match'),
						(5, 1, 'match'),
						(13, 1, 'match')
");

print('Sample matches added' . PHP_EOL);

$day = '01';
$day2 = '01';

$connection->exec("INSERT INTO
						messages (sender, receiver, `text`, `time`, `delivered`)
					VALUES
						(3, 1, 'Hi, how are you samim?', '2019-10-{$day} 09:45:03', 'Y'),
						(1, 3, 'Hi Maryam i am good tnx how about you?', '2019-10-{$day} 09:52:07', 'Y'),
						(3, 1, 'I am good too, thank you for your chat template', '2019-10-{$day} 09:54:07', 'Y'),
						(1, 3, 'You\'re welcome Maryam', '2019-10-{$day} 09:57:22', 'Y'),
						(3, 1, 'I am looking for your next templates', '2019-10-{$day} 10:01:14', 'Y'),
						(1, 3, 'Ok, thank you have a good day', '2019-10-{$day} 10:06:33', 'Y'),
						(3, 1, 'Bye, see you', '2019-10-{$day} 10:07:29', 'Y'),
						(5, 1, 'Samim, hi?', '2019-10-{$day2} 11:22:07', 'Y'),
						(1, 5, 'Hi Gina, how are you?', '2019-10-{$day2} 11:24:09', 'Y'),
						(5, 1, 'I am good good but who tf is Maryam???', '2019-10-{$day2} 11:24:28', 'Y'),
						(1, 5, 'That\'s strictly business between us, rest assured love', '2019-10-{$day2} 11:26:20', 'Y'),
						(5, 1, 'Yeah, sure. Knew I couldnt trust u', '2019-10-{$day2} 11:27:00', 'Y'),
						(1, 5, 'Hey I\'m just trading templates with her! Like this one.', '2019-10-{$day2} 11:29:47', 'Y'),
						(5, 1, 'Oh... Sorry for overreacting then baby. You know I love you and just am scared to lose you', '2019-10-{$day2} 11:42:42', 'Y'),
						(1, 5, 'That so sweet of yours! That will never happen, really', '2019-10-{$day2} 11:43:54', 'Y')
");

print('Sample messages added' . PHP_EOL);

$connection->exec("INSERT INTO
users (email, username, first_name, last_name, password, active, gender, preference, bday, location, latitude, longitude,  avatar)
VALUES
('test@mail.com', 'user', 'Klava', 'Klava', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 1, 'male', 'both', '44', 'Kiev',  '50.4547', '30.5238', '/default/jean.jpg'),
('zaria@mail.com', 'zaria', 'Zaria', 'Maxwell', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 1, 'female', 'male', '54', 'Cherkassy',  '50.4547', '30.5238', '/default/zaria.jpg'),
('claire@mail.com', 'user', 'Claire', 'Flores', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 1, 'female', 'male',  '20', 'Vyshneve',  '50.4547', '30.5238', '/default/claire.jpg'),
('gina@mail.com', 'gina', 'Gina', 'Matthews', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 1, 'female', 'male',  '18', 'Brovary',  '50.4547', '30.5238', '/default/gina.jpg'),
('henry@mail.com', 'user', 'Henry', 'Medina', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 1, 'male', 'female',  '22', 'Zhytomyr',  '50.4547', '30.5238', '/default/henry.jpg'),
('niko@mail.com', 'user', 'Niko', 'Belic', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 1, 'male', 'male', '33', 'Kyiv',  '50.4547', '30.5238', '/default/niko.jpg'),
('van@mail.com', 'user', 'Van', 'Mcneil', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 1, 'male', 'female', '42', 'Kiev',  '50.4547', '30.5238', '/default/van.jpg'),
('jean@mail.com', 'user', 'Jean', 'Brooks', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 1, 'female', 'female', '19', 'Chernihiv',  '50.4547', '30.5238', '/default/jean.jpg'),
('helen@mail.com', 'user', 'Helen', 'Odom', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 1, 'female', 'both',  '40', 'Kyiv',  '50.4547', '30.5238', '/default/helen.jpg'),
('owen@mail.com', 'user', 'Owen', 'Chambers', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '34', 'Kyiv', '50.393074', '30.498484', '/men/man16.jpg'),
('fritz@mail.com', 'user', 'Fritz', 'Dalton', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '31', 'Kiev', '50.4547', '30.5238', '/men/man17.jpg'),
('maxwell@mail.com', 'maxwell', 'Maxwell', 'Sosa', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '27', 'Kiev', '50.4547', '30.5238', '/men/man18.jpg'),
('nigel@mail.com', 'user', 'Nigel', 'Joseph', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '30', 'Kiev', '50.4547', '30.5238', '/men/man19.jpg'),
('guy@mail.com', 'user', 'Guy', 'Hodge', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '23', 'Kiev', '50.4547', '30.5238', '/men/man20.jpg'),
('gray@mail.com', 'user', 'Gray', 'Moran', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '45', 'Kiev', '50.4547', '30.5238', '/men/man21.jpg'),
('quinn@mail.com', 'user', 'Quinn', 'Elliott', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '44', 'Kiev', '50.4547', '30.5238', '/men/man22.jpg'),
('finn@mail.com', 'user', 'Finn', 'Gaines', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '32', 'Kiev', '50.4547', '30.5238', '/men/man23.jpg'),
('paki@mail.com', 'user', 'Paki', 'Lamb', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '36', 'Kiev', '50.4547', '30.5238', '/men/man24.jpg'),
('amery@mail.com', 'user', 'Amery', 'Hyde', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '32', 'Kiev', '50.4547', '30.5238', '/men/man25.jpg'),
('elvis@mail.com', 'user', 'Elvis', 'Burton', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '31', 'Kiev', '50.4547', '30.5238', '/men/man26.jpg'),
('bevis@mail.com', 'user', 'Bevis', 'James', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '20', 'Kiev', '50.4547', '30.5238', '/men/man27.jpg'),
('thaddeus@mail.com', 'user', 'Thaddeus', 'Frazier', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '29', 'Kiev', '50.4547', '30.5238', '/men/man28.jpg'),
('damon@mail.com', 'user', 'Damon', 'Mccall', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '34', 'Kiev', '50.4547', '30.5238', '/men/man29.jpg'),
('baxter@mail.com', 'user', 'Baxter', 'Oneal', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '31', 'Kiev', '50.4547', '30.5238', '/men/man30.jpg'),
('graham@mail.com', 'user', 'Graham', 'Cortez', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '42', 'Kiev', '50.4547', '30.5238', '/men/man31.jpg'),
('gil@mail.com', 'user', 'Gil', 'Nicholson', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '24', 'Kiev', '50.4547', '30.5238', '/men/man33.jpg'),
('xanthus@mail.com', 'user', 'Xanthus', 'Waters', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '23', 'Kiev', '50.4547', '30.5238', '/men/man34.jpg'),
('levi@mail.com', 'user', 'Levi', 'Chang', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '44', 'Kiev', '50.4547', '30.5238', '/men/man35.jpg'),
('quamar@mail.com', 'user', 'Quamar', 'Drake', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '31', 'Kiev', '50.4547', '30.5238', '/men/man36.jpg'),
('chaim@mail.com', 'user', 'Chaim', 'Holden', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '38', 'Kiev', '50.4547', '30.5238', '/men/man37.jpg'),
('joel@mail.com', 'user', 'Joel', 'Conway', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '24', 'Kiev', '50.4547', '30.5238', '/men/man38.jpg'),
('thomas@mail.com', 'user', 'Thomas', 'Perez', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '38', 'Kiev', '50.4547', '30.5238', '/men/man39.jpg'),
('russell@mail.com', 'user', 'Russell', 'Walter', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '46', 'Kiev', '50.4547', '30.5238', '/men/man40.jpg'),
('paul@mail.com', 'user', 'Paul', 'Callahan', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '30', 'Kiev', '50.4547', '30.5238', '/men/man41.jpg'),
('garth@mail.com', 'user', 'Garth', 'Fleming', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '37', 'Kiev', '50.4547', '30.5238', '/men/man42.jpg'),
('brady@mail.com', 'user', 'Brady', 'Hernandez', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '46', 'Kiev', '50.4547', '30.5238', '/men/man43.jpg'),
('ralph@mail.com', 'user', 'Ralph', 'Dillon', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '27', 'Kiev', '50.4547', '30.5238', '/men/man44.jpg'),
('kibo@mail.com', 'user', 'Kibo', 'Burch', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '39', 'Kiev', '50.4547', '30.5238', '/men/man46.jpg'),
('gareth@mail.com', 'user', 'Gareth', 'Cooley', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '25', 'Kiev', '50.4547', '30.5238', '/men/man47.jpg'),
('ryan@mail.com', 'user', 'Ryan', 'Solomon', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '31', 'Kiev', '50.4547', '30.5238', '/men/man48.jpg'),
('kennan@mail.com', 'user', 'Kennan', 'Mendez', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '27', 'Kiev', '50.4547', '30.5238', '/men/man49.jpg'),
('abbot@mail.com', 'user', 'Abbot', 'Hatfield', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '37', 'Kiev', '50.4547', '30.5238', '/men/man50.jpg'),
('merrill@mail.com', 'user', 'Merrill', 'Becker', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '30', 'Kiev', '50.4547', '30.5238', '/men/man51.jpg'),
('holmes@mail.com', 'user', 'Holmes', 'Wiggins', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '31', 'Kiev', '50.4547', '30.5238', '/men/man52.jpg'),
('drake@mail.com', 'user', 'Drake', 'Suarez', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '42', 'Kiev', '50.4547', '30.5238', '/men/man53.jpg'),
('evan@mail.com', 'user', 'Evan', 'Carrillo', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '38', 'Kiev', '50.4547', '30.5238', '/men/man55.jpg'),
('brendan@mail.com', 'user', 'Brendan', 'Justice', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '36', 'Kiev', '50.4547', '30.5238', '/men/man56.jpg'),
('orson@mail.com', 'user', 'Orson', 'Gregory', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '45', 'Kiev', '50.4547', '30.5238', '/men/man57.jpg'),
('gregory@mail.com', 'user', 'Gregory', 'Winters', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '19', 'Kiev', '50.4547', '30.5238', '/men/man58.jpg'),
('clark@mail.com', 'user', 'Clark', 'Neal', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '23', 'Kiev', '50.4547', '30.5238', '/men/man60.jpg'),
('zahir@mail.com', 'user', 'Zahir', 'Knowles', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '40', 'Kiev', '50.4547', '30.5238', '/men/man61.jpg'),
('edward@mail.com', 'user', 'Edward', 'Hoffman', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '20', 'Kiev', '50.4547', '30.5238', '/men/man62.jpg'),
('cruz@mail.com', 'user', 'Cruz', 'Carroll', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '22', 'Kiev', '50.4547', '30.5238', '/men/man63.jpg'),
('stone@mail.com', 'user', 'Stone', 'Mccall', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '30', 'Kiev', '50.4547', '30.5238', '/men/man65.jpg'),
('noah@mail.com', 'user', 'Noah', 'Dale', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '41', 'Kiev', '50.4547', '30.5238', '/men/man66.jpg'),
('alden@mail.com', 'user', 'Alden', 'Woods', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '35', 'Kiev', '50.4547', '30.5238', '/men/man67.jpg'),
('neville@mail.com', 'user', 'Neville', 'Hale', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '45', 'Kiev', '50.4547', '30.5238', '/men/man68.jpg'),
('dalton@mail.com', 'user', 'Dalton', 'Norton', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '39', 'Kiev', '50.4547', '30.5238', '/men/man69.jpg'),
('charles@mail.com', 'user', 'Charles', 'Holder', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '40', 'Kiev', '50.4547', '30.5238', '/men/man70.jpg'),
('eagan@mail.com', 'user', 'Eagan', 'Dale', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '46', 'Kiev', '50.4547', '30.5238', '/men/man71.jpg'),
('abdul@mail.com', 'user', 'Abdul', 'Hernandez', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '29', 'Kiev', '50.4547', '30.5238', '/men/man72.jpg'),
('flynn@mail.com', 'user', 'Flynn', 'Mcmahon', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '24', 'Kiev', '50.4547', '30.5238', '/men/man73.jpg'),
('camden@mail.com', 'user', 'Camden', 'Parrish', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '45', 'Kiev', '50.4547', '30.5238', '/men/man74.jpg'),
('elton@mail.com', 'user', 'Elton', 'Saunders', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '22', 'Kiev', '50.4547', '30.5238', '/men/man76.jpg'),
('tanek@mail.com', 'user', 'Tanek', 'Clay', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '36', 'Kiev', '50.4547', '30.5238', '/men/man77.jpg'),
('valentine@mail.com', 'user', 'Valentine', 'Palmer', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '30', 'Kiev', '50.4547', '30.5238', '/men/man78.jpg'),
('arsenio@mail.com', 'user', 'Arsenio', 'Hughes', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '29', 'Kiev', '50.4547', '30.5238', '/men/man79.jpg'),
('hall@mail.com', 'user', 'Hall', 'Sexton', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '33', 'Kiev', '50.4547', '30.5238', '/men/man80.jpg'),
('callum@mail.com', 'user', 'Callum', 'Singleton', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '36', 'Kiev', '50.4547', '30.5238', '/men/man81.jpg'),
('jesse@mail.com', 'user', 'Jesse', 'Taylor', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '32', 'Kiev', '50.4547', '30.5238', '/men/man82.jpg'),
('colin@mail.com', 'user', 'Colin', 'Stephenson', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '26', 'Kiev', '50.4547', '30.5238', '/men/man83.jpg'),
('akeem@mail.com', 'user', 'Akeem', 'Bishop', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '42', 'Kiev', '50.4547', '30.5238', '/men/man84.jpg'),
('garrison@mail.com', 'user', 'Garrison', 'Hinton', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '35', 'Kiev', '50.4547', '30.5238', '/men/man85.jpg'),
('brock@mail.com', 'user', 'Brock', 'Stone', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '39', 'Kiev', '50.4547', '30.5238', '/men/man86.jpg'),
('luke@mail.com', 'user', 'Luke', 'Wiley', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '27', 'Kiev', '50.4547', '30.5238', '/men/man87.jpg'),
('herman@mail.com', 'user', 'Herman', 'Livingston', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '23', 'Kiev', '50.4547', '30.5238', '/men/man90.jpg'),
('upton@mail.com', 'user', 'Upton', 'Greene', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '44', 'Kiev', '50.4547', '30.5238', '/men/man91.jpg'),
('plato@mail.com', 'user', 'Plato', 'Morse', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '42', 'Kiev', '50.4547', '30.5238', '/men/man92.jpg'),
('rudyard@mail.com', 'user', 'Rudyard', 'Newton', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '19', 'Kiev', '50.4547', '30.5238', '/men/man93.jpg'),
('armand@mail.com', 'user', 'Armand', 'Shields', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '22', 'Kiev', '50.4547', '30.5238', '/men/man94.jpg'),
('simon@mail.com', 'user', 'Simon', 'Forbes', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '35', 'Kiev', '50.4547', '30.5238', '/men/man95.jpg'),
('neil@mail.com', 'user', 'Neil', 'Pugh', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '27', 'Kiev', '50.4547', '30.5238', '/men/man96.jpg'),
('alan@mail.com', 'user', 'Alan', 'Olsen', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '28', 'Kiev', '50.4547', '30.5238', '/men/man97.jpg'),
('john@mail.com', 'user', 'John', 'Brennan', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '19', 'Kiev', '50.4547', '30.5238', '/men/man98.jpg'),
('nasim@mail.com', 'user', 'Nasim', 'Solomon', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'male', 'female', '30', 'Kiev', '50.4547', '30.5238', '/men/man99.jpg'),
('xyla@mail.com', 'user', 'Xyla', 'Valencia', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '22', 'Kiev', '50.4547', '30.5238', '/women/woman0.jpg'),
('willa@mail.com', 'user', 'Willa', 'Waters', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '43', 'Kiev', '50.4547', '30.5238', '/women/woman1.jpg'),
('melanie@mail.com', 'user', 'Melanie', 'Spencer', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '37', 'Kiev', '50.4547', '30.5238', '/women/woman2.jpg'),
('jade@mail.com', 'user', 'Jade', 'Craig', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '40', 'Kiev', '50.4547', '30.5238', '/women/woman3.jpg'),
('marah@mail.com', 'user', 'Marah', 'Workman', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '38', 'Kiev', '50.4547', '30.5238', '/women/woman55.jpg'),
('ifeoma@mail.com', 'user', 'Ifeoma', 'Trevino', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '24', 'Kiev', '50.4547', '30.5238', '/women/woman5.jpg'),
('ava@mail.com', 'user', 'Ava', 'Taylor', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '19', 'Kiev', '50.4547', '30.5238', '/women/woman56.jpg'),
('taylor@mail.com', 'user', 'Taylor', 'Conway', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '36', 'Kiev', '50.4547', '30.5238', '/women/woman7.jpg'),
('iola@mail.com', 'user', 'Iola', 'Delaney', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '27', 'Kiev', '50.4547', '30.5238', '/women/woman8.jpg'),
('hadassah@mail.com', 'user', 'Hadassah', 'Richard', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '29', 'Kiev', '50.4547', '30.5238', '/women/woman51.jpg'),
('amy@mail.com', 'user', 'Amy', 'Lowery', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '36', 'Kiev', '50.4547', '30.5238', '/women/woman10.jpg'),
('xerxes@mail.com', 'user', 'Xerxes', 'Peck', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '26', 'Kiev', '50.4547', '30.5238', '/women/woman11.jpg'),
('chiquita@mail.com', 'user', 'Chiquita', 'Peters', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '28', 'Kiev', '50.4547', '30.5238', '/women/woman12.jpg'),
('charlotte@mail.com', 'user', 'Charlotte', 'Wall', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '28', 'Kiev', '50.4547', '30.5238', '/women/woman13.jpg'),
('kaitlin@mail.com', 'user', 'Kaitlin', 'Cooper', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '35', 'Kiev', '50.4547', '30.5238', '/women/woman14.jpg'),
('meredith@mail.com', 'user', 'Meredith', 'Lloyd', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '33', 'Kiev', '50.4547', '30.5238', '/women/woman15.jpg'),
('melodie@mail.com', 'user', 'Melodie', 'Jackson', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '21', 'Kiev', '50.4547', '30.5238', '/women/woman16.jpg'),
('rina@mail.com', 'user', 'Rina', 'Chavez', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '33', 'Kiev', '50.4547', '30.5238', '/women/woman17.jpg'),
('dai@mail.com', 'user', 'Dai', 'Sanders', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '33', 'Kiev', '50.4547', '30.5238', '/women/woman18.jpg'),
('meghan@mail.com', 'user', 'Meghan', 'Decker', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '34', 'Kiev', '50.4547', '30.5238', '/women/woman19.jpg'),
('joelle@mail.com', 'user', 'Joelle', 'Fischer', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '39', 'Kiev', '50.4547', '30.5238', '/women/woman20.jpg'),
('jenna@mail.com', 'user', 'Jenna', 'Gregory', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '19', 'Kiev', '50.4547', '30.5238', '/women/woman21.jpg'),
('leilani@mail.com', 'user', 'Leilani', 'Jones', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '44', 'Kiev', '50.4547', '30.5238', '/women/woman22.jpg'),
('cameron@mail.com', 'user', 'Cameron', 'Cohen', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '22', 'Kiev', '50.4547', '30.5238', '/women/woman23.jpg'),
('jessica@mail.com', 'user', 'Jessica', 'Ortiz', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '20', 'Kiev', '50.4547', '30.5238', '/women/woman24.jpg'),
('susan@mail.com', 'user', 'Susan', 'Baxter', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '29', 'Kiev', '50.4547', '30.5238', '/women/woman25.jpg'),
('idona@mail.com', 'user', 'Idona', 'Sutton', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '26', 'Kiev', '50.4547', '30.5238', '/women/woman26.jpg'),
('ingrid@mail.com', 'user', 'Ingrid', 'Vazquez', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '29', 'Kiev', '50.4547', '30.5238', '/women/woman27.jpg'),
('mechelle@mail.com', 'user', 'Mechelle', 'Vaughan', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '39', 'Kiev', '50.4547', '30.5238', '/women/woman28.jpg'),
('maggy@mail.com', 'user', 'Maggy', 'Fry', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '31', 'Kiev', '50.4547', '30.5238', '/women/woman29.jpg'),
('roanna@mail.com', 'user', 'Roanna', 'Dunlap', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '29', 'Kiev', '50.4547', '30.5238', '/women/woman30.jpg'),
('ocean@mail.com', 'user', 'Ocean', 'Whitfield', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '24', 'Kiev', '50.4547', '30.5238', '/women/woman31.jpg'),
('miriam@mail.com', 'user', 'Miriam', 'Mcdonald', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '19', 'Kiev', '50.4547', '30.5238', '/women/woman32.jpg'),
('alice@mail.com', 'user', 'Alice', 'Coleman', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '26', 'Kiev', '50.4547', '30.5238', '/women/woman33.jpg'),
('candice@mail.com', 'user', 'Candice', 'Wise', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '44', 'Kiev', '50.4547', '30.5238', '/women/woman34.jpg'),
('avye@mail.com', 'user', 'Avye', 'Cummings', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '30', 'Kiev', '50.4547', '30.5238', '/women/woman35.jpg'),
('nomlanga@mail.com', 'user', 'Nomlanga', 'Cameron', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '42', 'Kiev', '50.4547', '30.5238', '/women/woman36.jpg'),
('amanda@mail.com', 'user', 'Amanda', 'Hayden', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '44', 'Kiev', '50.4547', '30.5238', '/women/woman37.jpg'),
('miranda@mail.com', 'user', 'Miranda', 'Johns', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '21', 'Kiev', '50.4547', '30.5238', '/women/woman38.jpg'),
('indira@mail.com', 'user', 'Indira', 'Hicks', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '21', 'Kiev', '50.4547', '30.5238', '/women/woman39.jpg'),
('angela@mail.com', 'user', 'Angela', 'Gill', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '34', 'Kiev', '50.4547', '30.5238', '/women/woman40.jpg'),
('maxine@mail.com', 'user', 'Maxine', 'Sharp', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '40', 'Kiev', '50.4547', '30.5238', '/women/woman41.jpg'),
('n@mail.com', 'user', 'Madison', 'Erickson', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '32', 'Kiev', '50.4547', '30.5238', '/women/woman99.jpg'),
('alexis@mail.com', 'user', 'Alexis', 'Stevens', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '32', 'Kiev', '50.4547', '30.5238', '/women/woman43.jpg'),
('sarah@mail.com', 'user', 'Sarah', 'Sweet', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '39', 'Kiev', '50.4547', '30.5238', '/women/woman44.jpg'),
('rhiannon@mail.com', 'user', 'Rhiannon', 'Romero', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '25', 'Kiev', '50.4547', '30.5238', '/women/woman45.jpg'),
('clementine@mail.com', 'user', 'Clementine', 'Baird', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '35', 'Kiev', '50.4547', '30.5238', '/women/woman46.jpg'),
('urielle@mail.com', 'user', 'Urielle', 'Joyce', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '21', 'Kiev', '50.4547', '30.5238', '/women/woman47.jpg'),
('oprah@mail.com', 'user', 'Oprah', 'William', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', '1', 'female', 'male', '34', 'Kiev', '50.4547', '30.5238', '/women/woman52.jpg'),
('mila@mail.com', 'user', 'Mila', 'Bonilla', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 1, 'female', 'both', '23', 'Brovary',  '50.4547', '30.5238', '/women/woman50.jpg')");

print('Sample users created' . PHP_EOL);

?>
