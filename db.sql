CREATE TABLE stok_barang (id_barang VARCHAR(5) NOT NULL PRIMARY KEY,
                        nama_barang VARCHAR(30) NOT NULL,
                        stok INT, harga INT);
INSERT INTO stok_barang VALUES ('PE001', 'Pensil Faber Castle', 100, 2500),
                        ('PU001', 'Pulpen Pilot', 150, 3000),
                        ('PU002', 'Pulpen Faster', 70, 3500),
                        ('ER001', 'Penghapus Joyko', 120, 1000),
                        ('ER002', 'Penghapus Pelikan', 50, 1500),
                        ('RU001', 'Penggaris Butterfly', 80, 5000);

CREATE TABLE pembelian_barang (id_barang VARCHAR(5),
                            tgl_beli DATE,
                            quantity INT NOT NULL);

CREATE TABLE penjualan_barang (id_barang VARCHAR(5),
                                tgl_jual DATE,
                                quantity INT NOT NULL,
                                nama_pembeli VARCHAR(50) NOT NULL);