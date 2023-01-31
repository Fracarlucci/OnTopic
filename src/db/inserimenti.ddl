INSERT INTO UTENTE (Nome, Cognome, Username, Email, Password)
    VALUES  ('Francesco', 'Carlucci', 'Ciccio', 'francesco.carlucci6@studio.unibo.it', 'password'),
            ('Dilaver', 'Shtini', 'Veri', 'dilaver.shtini@studio.unibo.it', 'password'),
            ('Daniele', 'Pancottini', 'Dani', 'daniele.pancottini@studio.unibo.it', 'password');

INSERT INTO TEMA (Data, Nome)
    VALUES  ('2022-01-20', 'Rap'),
            ('2022-01-21', 'Macchine'),
            ('2022-01-22', 'Cucina');

INSERT INTO POST (Testo, idTema, idUtente)
    VALUES  ('Le rose sono rosse, le viole sono blu, rondo è il miglior rapper d\'Italia', 1, 1),
            ('Ciao a tutti ragazzi, con questo super pezzo in tangenziale, Martin Garrix... 130... Animals... SI VOLAAAAAAA!!!!', 1, 2),
            ('Mi hanno rotto il retronebbia, posso sostituirlo con una pistola ad acqua?', 2, 3);

INSERT INTO SEGUI (idSeguito, idSeguace)
    VALUES  (1, 2),
            (1, 3),
            (2, 1),
            (2, 3),
            (3, 1),
            (3, 2);