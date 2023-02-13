INSERT INTO UTENTE (Nome, Cognome, Username, Email, Password)
    VALUES  ('Francesco', 'Carlucci', 'Ciccio', 'francesco.carlucci6@studio.unibo.it', 'password'),
            ('Dilaver', 'Shtini', 'Veri', 'dilaver.shtini@studio.unibo.it', 'password'),
            ('Daniele', 'Pancottini', 'Dani', 'daniele.pancottini@studio.unibo.it', 'password');

INSERT INTO TEMA (Data, Nome)
    VALUES  ('2023-01-20', 'Rap'),
            ('2023-01-21', 'Macchine'),
            ('2023-01-22', 'Cucina'),
            ('2023-01-23', 'Robot'),
            ('2023-01-24', 'Guerra in Ucraina'),
            ('2023-01-25', 'Orologi'),
            ('2023-01-26', 'Vestiti'),
            ('2023-01-27', 'Giochi da tavolo'),
            ('2023-01-28', 'Viaggi'),
            ('2023-01-29', 'Telefonia'),
            ('2023-01-30', 'Computer'),
            ('2023-01-31', 'Libri'),
            ('2023-02-02', 'Cinema'),
            ('2023-02-03', 'Animali domestici'),
            ('2023-02-11', 'Vaccini'),
            ('2023-02-12', 'Biciclette'),
            ('2023-02-12', 'Pena di morte');

INSERT INTO POST (Testo, idTema, idUtente)
    VALUES  ('Le rose sono rosse, le viole sono blu, rondo è il miglior rapper d\'Italia', 1, 1),
            ('Ciao a tutti ragazzi, con questo super pezzo in tangenziale, Martin Garrix... 130... Animals... SI VOLAAAAAAA!!!!', 1, 2),
            ('Mi hanno rotto il retronebbia, posso sostituirlo con una pistola ad acqua?', 2, 3),
            ('Non so quale libro giallo comprare, consigli?', 12, 3),
            ('Un telefono low cost?', 10, 2),
            ('Cosa vedere in 4 giorni a Lisbona?', 9, 2),
            ('Strategie per vincere a Risiko?', 8, 1),
            ('Voglio inziare a vedere i film di Tarantino, ma sono indeciso da quale iniziare, consigli?', 13, 3),
            ('Quanto costa mantenere un cane?', 14, 1),
            ('Ho un labrador che da poco ha fatto i cuccioli, qualcuno interessato?', 14, 2);