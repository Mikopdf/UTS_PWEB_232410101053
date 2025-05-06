<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private function checkAuth()
    {
        if (!session()->has('username')) {
            abort(403, 'Silakan login terlebih dahulu');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3',
            'password' => 'required|min:3'
        ]);

        session([
            'username' => $request->username,
            'logged_in' => true
        ]);

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }

    public function dashboard()
    {
        $this->checkAuth();
        return view('dashboard', ['username' => session('username')]);
    }

    public function profile()
    {
        $this->checkAuth();
        return view('profile', ['username' => session('username')]);
    }

    public function pengelolaan()
    {
        $this->checkAuth();

        $items = [
            [
                'id' => 1,
                'nama' => 'Margit the Fell Omen',
                'deskripsi_singkat' => 'Rec. Lv 25',
                'deskripsi_panjang' => '
                Margit the Fell Omen adalah salah satu bos yang dihadapi pemain di Elden Ring.
                Dia ditemukan di Stormhill, dekat pintu masuk Stormveil Castle. Untuk mengalahkannya,
                pemain disarankan memiliki level sekitar 25 agar pertarungan lebih seimbang. Margit memiliki kelemahan terhadap Poison,
                Scarlet Rot, Bleed, Frost, dan Sleep, tetapi kebal terhadap serangan bertipe Slash, Pierce, dan Holy damage. Pemain bisa
                memanggil Sorcerer Rogier sebagai NPC bantuan atau menggunakan Spirit Ashes dalam pertempuran. Setelah dikalahkan, Margit
                memberikan hadiah berupa 12,000 Runes dan Talisman Pouch. Strategi untuk mengalahkannya meliputi penggunaan Spirit Ashes dan Summons untuk mengalihkan perhatiannya, menyerang dari belakang agar terhindar dari serangan agresifnya, serta mempelajari pola serangannya untuk menghindari serangan yang tidak terduga. Pemain sebaiknya meningkatkan senjata terlebih dahulu sebelum bertarung dan menggunakan Margits Shackles yang bisa dibeli dari Patches untuk sementara waktu
                menahannya. Margit memiliki pola serangan yang bervariasi, termasuk lemparan belati, ayunan tongkat,
                dan serangan palu. Pemain yang menggunakan serangan jarak jauh disarankan menggunakan Meteorite Staff dan Rock Sling untuk memudahkan pertarungan.
                ',
                'gambar' => 'images/boss1.png',
                'gambar_tambahan' => 'images/show1.png'
            ],
            [
                'id' => 2,
                'nama' => 'Godrick the Grafted',
                'deskripsi_singkat' => 'Rec. Lv 30',
                'deskripsi_panjang' => 'Godrick the Grafted adalah bos yang kuat di Elden Ring dan dapat ditemukan di area terakhir Stormveil Castle, Limgrave. Sebagai Demigod dan Shardbearer, mengalahkannya memberikan hadiah penting seperti Godricks Great Rune dan Remembrance of the Grafted. Pemain disarankan untuk memiliki level sekitar 30 agar pertarungan lebih seimbang. Godrick memiliki kelemahan terhadap Poison, Bleed, Scarlet Rot, Frost, dan Sleep, tetapi kebal terhadap Madness. Pemain dapat memanggil Nepheli Loux sebagai NPC bantuan atau menggunakan Spirit Ashes untuk membantu dalam pertempuran. Setelah dikalahkan, Godrick memberikan 20,000 Runes sebagai hadiah utama.
                Untuk mengalahkannya, pemain harus tetap bergerak dan memanfaatkan area terbuka untuk menghindari serangannya.
                Godrick memiliki serangan yang luas dan kuat, termasuk Dragon Arm, yang bisa menyemburkan api. Pemain bisa memilih untuk menjaga jarak atau berada tepat di depan untuk menghindari efek penuh dari serangannya. Spirit Ashes dapat digunakan untuk mengalihkan perhatiannya, sementara stamina perlu dikelola dengan baik agar pemain bisa melakukan dodge terhadap serangan yang mematikan.',
                'gambar' => 'images/boss2.png',
                'gambar_tambahan' => 'images/show2.png'
            ],
            [
                'id' => 3,
                'nama' => 'Red Wolf of Radagon',
                'deskripsi_singkat' => 'Rec. Lv 35',
                'deskripsi_panjang' => 'Red Wolf of Radagon adalah bos yang ditemukan di Academy of Raya Lucaria, Elden Ring. Bos ini dikenal karena kecepatannya dan penggunaan sihir Glintstone, yang membuat pertarungan menjadi sulit bagi pemain yang menggunakan senjata berat atau sihir dengan waktu casting yang lama.
                Red Wolf memiliki beberapa kelemahan, termasuk Poison, Scarlet Rot, Frost, Bleed, dan Sleep, tetapi kebal terhadap Magic, Madness,
                dan Instant Death. Pemain dapat menggunakan Spirit Ashes untuk membantu dalam pertarungan, terutama di lokasi seperti Academy of Raya Lucaria, West Liurnia, dan Nokron, Eternal City. Namun, di Moonlight Altar dan Consecrated Snowfield, Spirit Ashes tidak dapat digunakan.',
                'gambar' => 'images/boss3.png',
                'gambar_tambahan' => 'images/show3.png'
            ],
            [
                'id' => 4,
                'nama' => 'Rennala, Queen of the Full Moon',
                'deskripsi_singkat' => 'Rec. Lv 40',
                'deskripsi_panjang' => 'Rennala, Queen of the Full Moon, adalah bos utama di Elden Ring yang ditemukan di Academy of Raya Lucaria, Liurnia of the Lakes. Dia adalah seorang penyihir kuat dan pemimpin keluarga kerajaan Carian. Meskipun bukan seorang demigod, Rennala adalah Shardbearer, yang berarti mengalahkannya memberikan akses ke Great Rune of the Unborn dan Remembrance of the Full Moon Queen.
                Rennala memiliki kelemahan terhadap Bleed, Frostbite, Poison, dan Scarlet Rot, tetapi kebal terhadap Magic, Fire, Holy, dan Lightning. Pemain dapat menggunakan Spirit Ashes dalam pertarungan, tetapi tidak ada NPC yang bisa dipanggil untuk membantu. Disarankan untuk menghadapi Rennala dengan level 40 agar pertarungan lebih seimbang.',
                'gambar' => 'images/boss4.png',
                'gambar_tambahan' => 'images/show4.png'
            ],
            [
                'id' => 5,
                'nama' => 'Starscourge Radahn',
                'deskripsi_singkat' => 'Rec. Lv 70',
                'deskripsi_panjang' => 'Starscourge Radahn adalah bos legendaris dalam Elden Ring yang ditemukan di Redmane Castle, Caelid. Dia dikenal sebagai salah satu demigod terkuat, dengan kemampuan mengendalikan gravitasi untuk menahan bintang-bintang di langit. Radahn adalah anak dari Queen Rennala dan Radagon, serta saudara dari Praetor Rykard dan Lunar Princess Ranni. Namun, setelah bertarung melawan Malenia, Blade of Miquella, Radahn terkena Scarlet Rot, yang membuatnya kehilangan akal dan menjadi liar.
                Radahn memiliki kelemahan terhadap Bleed, Poison, dan Scarlet Rot, tetapi kebal terhadap Holy damage. Pemain tidak bisa menggunakan Spirit Ashes dalam pertarungan ini, tetapi bisa memanggil beberapa NPC, seperti Alexander, Blaidd the Half-Wolf, Finger Maiden Therolina, Great Horned Tragoth, Jerren, Lionel the Lionhearted, Okina, dan Patches, untuk membantu dalam pertempuran. Setelah dikalahkan, Radahn memberikan hadiah berupa 70,000 Runes, Radahns Great Rune, dan Remembrance of the Starscourge.',
                'gambar' => 'images/boss5.png',
                'gambar_tambahan' => 'images/show5.png'
            ],
            [
                'id' => 6,
                'nama' => 'Rykard, Lord of Blasphemy',
                'deskripsi_singkat' => 'Rec. Lv 80',
                'deskripsi_panjang' => 'Rykard, Lord of Blasphemy, adalah bos yang ditemukan di Volcano Manor, Altus Plateau, dalam Elden Ring. Dia adalah Shardbearer, yang berarti mengalahkannya memberikan akses ke Rykards Great Rune dan Remembrance of the Blasphemous. Rykard dulunya adalah seorang demigod, tetapi dia mengorbankan dirinya kepada God-Devouring Serpent untuk mendapatkan kekuatan yang lebih besar.
                Rykard memiliki kelemahan terhadap Bleed, Frostbite, Poison, dan Scarlet Rot, tetapi kebal terhadap Magic, Fire, dan Holy damage. Pemain dapat menggunakan Spirit Ashes dalam pertarungan, tetapi tidak ada NPC yang bisa dipanggil untuk membantu. Disarankan untuk menghadapi Rykard dengan level 80 agar pertarungan lebih seimbang.',
                'gambar' => 'images/boss6.png',
                'gambar_tambahan' => 'images/show6.png'
            ],
            [
                'id' => 7,
                'nama' => 'Magma Wyrm',
                'deskripsi_singkat' => 'Rec. Lv 60',
                'deskripsi_panjang' => 'Magma Wyrm adalah bos yang muncul di berbagai lokasi dalam Elden Ring. Bos ini memiliki serangan berbasis magma dan api, membuatnya sangat berbahaya bagi pemain yang tidak memiliki perlindungan terhadap elemen tersebut. Magma Wyrm dapat ditemukan di beberapa tempat, termasuk Gael Tunnel, Fort Laeidd, Volcano Manor, dan Dragons Pit (DLC). Untuk menghadapi bos ini, pemain disarankan memiliki level 70+ di sebagian besar lokasi, kecuali di Dragons Pit, di mana level yang direkomendasikan adalah 150+.
                Strategi utama untuk mengalahkan Magma Wyrm adalah dengan meningkatkan ketahanan terhadap api, menggunakan Spirit Ashes untuk mengalihkan perhatiannya, serta memanfaatkan senjata atau sihir yang dapat menyebabkan Bleed, Poison, atau Scarlet Rot, karena bos ini hanya memiliki resistensi sedang terhadap efek tersebut. Pemain juga disarankan untuk menghindari serangan dengan berguling ke samping atau ke arah Magma Wyrm, karena sebagian besar serangannya memiliki pola yang dapat diprediksi.',
                'gambar' => 'images/boss7.png',
                'gambar_tambahan' => 'images/show7.png'
            ],
            [
                'id' => 8,
                'nama' => 'Draconic Tree Sentinel',
                'deskripsi_singkat' => 'Rec. Lv 60',
                'deskripsi_panjang' => 'Draconic Tree Sentinel adalah bos opsional dalam Elden Ring yang ditemukan di Capital Outskirts, Altus Plateau, tepat di gerbang timur laut menuju Leyndell, Royal Capital. Bos ini merupakan versi yang lebih kuat dari Tree Sentinel, dengan kemampuan serangan berbasis petir dan api, menjadikannya tantangan berat bagi pemain yang ingin memasuki ibu kota.
                Draconic Tree Sentinel memiliki kelemahan terhadap Poison, Scarlet Rot, Bleed, Frost, dan Sleep, tetapi kebal terhadap Slash, Fire, dan Lightning. Pemain dapat menggunakan Spirit Ashes dalam pertarungan, dan dua NPC yang bisa dipanggil untuk membantu adalah Great Horned Tragoth dan Millicent. Setelah dikalahkan, bos ini memberikan hadiah berupa 50,000 Runes, Dragon Greatclaw, dan Dragonclaw Shield.',
                'gambar' => 'images/boss8.png',
                'gambar_tambahan' => 'images/show8.png'
            ],
            [
                'id' => 9,
                'nama' => 'Godfrey, First Elden Lord',
                'deskripsi_singkat' => 'Rec. Lv 60',
                'deskripsi_panjang' => 'Godfrey, First Elden Lord, adalah bos utama dalam Elden Ring yang ditemukan di Leyndell, Royal Capital, di wilayah Altus Plateau. Dia adalah Elden Lord pertama dan mantan konsort Queen Marika, yang kemudian kehilangan anugerahnya dan menjadi Tarnished. Pertarungan melawan Godfrey terjadi dalam dua fase, dengan versi awalnya menggunakan kapak besar dan versi keduanya berubah menjadi Hoarah Loux, Warrior, di mana dia bertarung dengan tangan kosong.
                Godfrey memiliki kelemahan terhadap Poison, Bleed, Scarlet Rot, Frost, dan Sleep, tetapi kebal terhadap Holy damage. Pemain dapat menggunakan Spirit Ashes dalam pertarungan, tetapi tidak ada NPC yang bisa dipanggil untuk membantu. Disarankan untuk menghadapi Godfrey dengan level 60 agar pertarungan lebih seimbang. Setelah dikalahkan, dia memberikan hadiah berupa 80,000 Runes dan Talisman Pouch.',
                'gambar' => 'images/boss9.png',
                'gambar_tambahan' => 'images/show9.png'
            ],
            [
                'id' => 10,
                'nama' => 'Morgott, the Omen King',
                'deskripsi_singkat' => 'Rec. Lv 80',
                'deskripsi_panjang' => 'Morgott, the Omen King, adalah bos utama dalam Elden Ring yang ditemukan di Leyndell, Royal Capital, setelah pemain mengalahkan Godfrey, First Elden Lords Golden Shade. Dia adalah demigod dan saudara kembar Mohg, Lord of Blood, tetapi berbeda dari saudaranya, Morgott tetap setia kepada Golden Order meskipun dikucilkan karena menjadi Omen.
                Morgott memiliki kelemahan terhadap Bleed, Frostbite, Poison, dan Scarlet Rot, tetapi kebal terhadap Holy damage. Pemain dapat menggunakan Spirit Ashes dalam pertarungan, dan NPC yang bisa dipanggil untuk membantu adalah Melina. Disarankan untuk menghadapi Morgott dengan level 80 agar pertarungan lebih seimbang. Setelah dikalahkan, dia memberikan hadiah berupa 90,000 Runes, Morgotts Great Rune, dan Remembrance of the Omen King.',
                'gambar' => 'images/boss10.png',
                'gambar_tambahan' => 'images/show10.png'
            ],
            [
                'id' => 11,
                'nama' => 'Fire Giant',
                'deskripsi_singkat' => 'Rec. Lv 85',
                'deskripsi_panjang' => 'Fire Giant adalah bos utama dalam Elden Ring yang ditemukan di Flame Peak, Mountaintops of the Giants. Pemain harus mengalahkannya untuk melanjutkan cerita utama. Bos ini memiliki serangan berbasis api yang sangat kuat dan area serangan yang luas, sehingga persiapan yang matang sangat penting sebelum bertarung.
                Fire Giant memiliki kelemahan terhadap Slash, Bleed, Frostbite, dan Lightning, tetapi kebal terhadap Fire, Holy, Scarlet Rot, dan Poison. Pemain dapat menggunakan Spirit Ashes dalam pertarungan, dan NPC yang bisa dipanggil untuk membantu adalah Alexander. Disarankan untuk menghadapi Fire Giant dengan level 85 agar pertarungan lebih seimbang. Setelah dikalahkan, dia memberikan hadiah berupa 180,000 Runes dan Remembrance of the Fire Giant.',
                'gambar' => 'images/boss11.png',
                'gambar_tambahan' => 'images/show11.png'
            ],
            [
                'id' => 12,
                'nama' => 'Godskin Duo',
                'deskripsi_singkat' => 'Rec. Lv 95',
                'deskripsi_panjang' => 'Godskin Duo adalah bos utama dalam Elden Ring yang ditemukan di Dragon Temple, Crumbling Farum Azula. Pertarungan ini mengharuskan pemain menghadapi Godskin Apostle dan Godskin Noble secara bersamaan, dengan satu health bar utama yang harus dikurangi hingga habis untuk mengalahkan mereka.
                Godskin Duo memiliki kelemahan terhadap Bleed, tetapi kebal terhadap Slash, Pierce, Fire, dan Holy damage. Pemain dapat menggunakan Spirit Ashes dalam pertarungan, tetapi tidak ada NPC yang bisa dipanggil untuk membantu. Disarankan untuk menghadapi mereka dengan level 95 agar pertarungan lebih seimbang. Setelah dikalahkan, mereka memberikan hadiah berupa 170,000 Runes, Smithing-Stone Miners Bell Bearing [4], dan Ash of War: Black Flame Tornado.',
                'gambar' => 'images/boss12.png',
                'gambar_tambahan' => 'images/show12.png'
            ],
            [
                'id' => 13,
                'nama' => 'Maliketh, The Black Blade',
                'deskripsi_singkat' => 'Rec. Lv 110',
                'deskripsi_panjang' => 'Maliketh, The Black Blade adalah bos utama dalam Elden Ring yang ditemukan di Crumbling Farum Azula. Pertarungan ini terbagi menjadi dua fase, di mana Maliketh pertama kali muncul sebagai Beast Clergyman sebelum mengungkapkan wujud aslinya sebagai Maliketh, The Black Blade. Pemain harus mengalahkannya untuk melanjutkan cerita utama.
                Maliketh memiliki kelemahan terhadap Bleed, tetapi kebal terhadap Holy damage. Pemain dapat menggunakan Spirit Ashes dalam pertarungan, tetapi tidak ada NPC yang bisa dipanggil untuk membantu. Disarankan untuk menghadapi Maliketh dengan level 110 agar pertarungan lebih seimbang. Setelah dikalahkan, dia memberikan hadiah berupa 220,000 Runes dan Remembrance of the Black Blade.',
                'gambar' => 'images/boss13.png',
                'gambar_tambahan' => 'images/show13.png'
            ],
            [
                'id' => 14,
                'nama' => 'Sir Gideon Ofnir, the All-Knowing',
                'deskripsi_singkat' => 'Rec. Lv 110',
                'deskripsi_panjang' => 'Sir Gideon Ofnir, the All-Knowing, adalah bos utama dalam Elden Ring yang ditemukan di Erdtree Sanctuary, Leyndell, Ashen Capital, di wilayah Altus Plateau. Sebagai pemimpin Roundtable Hold, dia adalah seorang penyihir yang menggunakan berbagai sihir dan inkantasi dari bos lain yang telah dikalahkan oleh pemain. Meskipun memiliki banyak kemampuan, dia memiliki pertahanan yang lemah, sehingga pertarungan bisa diselesaikan dengan cepat jika pemain tetap agresif.
                Sir Gideon Ofnir memiliki kelemahan terhadap Bleed dan Madness, tetapi tidak memiliki resistensi khusus terhadap serangan lainnya. Pemain dapat menggunakan Spirit Ashes dalam pertarungan, tetapi tidak ada NPC yang bisa dipanggil untuk membantu. Disarankan untuk menghadapi Gideon dengan level 110 agar pertarungan lebih seimbang. Setelah dikalahkan, dia memberikan hadiah berupa 150,000 Runes, Scepter of the All-Knowing, serta All-Knowing Armor Set, yang terdiri dari helm, baju zirah, sarung tangan, dan greaves.',
                'gambar' => 'images/boss14.png',
                'gambar_tambahan' => 'images/show14.png'
            ],
            [
                'id' => 15,
                'nama' => 'Hoarah Loux, Warrior',
                'deskripsi_singkat' => 'Rec. Lv 110',
                'deskripsi_panjang' => 'Hoarah Loux, Warrior, adalah bos utama dalam Elden Ring yang ditemukan di Elden Throne, Leyndell, Ashen Capital, di wilayah Altus Plateau. Dia adalah wujud asli dari Godfrey, First Elden Lord, yang melepaskan kendali atas Beast Regent Serosh dan kembali ke sifat aslinya sebagai petarung brutal. Pemain harus mengalahkannya untuk melanjutkan cerita utama.
                Hoarah Loux memiliki kelemahan terhadap Bleed, Frost, Poison, dan Scarlet Rot, tetapi kebal terhadap Holy damage. Pemain dapat menggunakan Spirit Ashes dalam pertarungan, dan dua NPC yang bisa dipanggil untuk membantu adalah Nepheli Loux dan Shabriri. Disarankan untuk menghadapi Hoarah Loux dengan level 110 agar pertarungan lebih seimbang. Setelah dikalahkan, dia memberikan hadiah berupa 300,000 Runes dan Remembrance of Hoarah Loux.',
                'gambar' => 'images/boss15.png',
                'gambar_tambahan' => 'images/show15.png'
            ],
            [
                'id' => 16,
                'nama' => 'Radagon of the Golden Order',
                'deskripsi_singkat' => 'Rec. Lv 125',
                'deskripsi_panjang' => 'Radagon of the Golden Order adalah salah satu bos terakhir dalam Elden Ring, ditemukan di Erdtree, Leyndell, Ashen Capital, di wilayah Altus Plateau. Pemain harus mengalahkannya untuk melanjutkan ke fase terakhir dari pertarungan bos utama.
                Radagon memiliki kelemahan terhadap Frostbite, tetapi kebal terhadap Fire, Holy, dan Bleed. Pemain dapat menggunakan Spirit Ashes dalam pertarungan, tetapi tidak ada NPC yang bisa dipanggil untuk membantu. Disarankan untuk menghadapi Radagon dengan level 125 agar pertarungan lebih seimbang. Setelah dikalahkan, dia tidak memberikan item drop, tetapi pertarungan berlanjut ke fase berikutnya melawan Elden Beast.',
                'gambar' => 'images/boss16.png',
                'gambar_tambahan' => 'images/show16.png'
            ],
            [
                'id' => 17,
                'nama' => 'Elden Beast',
                'deskripsi_singkat' => 'Rec. Lv 125',
                'deskripsi_panjang' => 'Elden Beast adalah bos terakhir dalam Elden Ring, ditemukan di Erdtree, Leyndell, Ashen Capital, di wilayah Altus Plateau. Pertarungan ini terjadi setelah pemain mengalahkan Radagon of the Golden Order, menjadikannya fase kedua dari bos terakhir dalam permainan.
                Elden Beast memiliki kelemahan terhadap serangan berbasis Frostbite, tetapi kebal terhadap Holy dan Bleed. Pemain dapat menggunakan Spirit Ashes dalam pertarungan, tetapi tidak ada NPC yang bisa dipanggil untuk membantu. Disarankan untuk menghadapi Elden Beast dengan level 125 agar pertarungan lebih seimbang. Setelah dikalahkan, bos ini memberikan hadiah berupa 500,000 Runes dan Elden Remembrance.',
                'gambar' => 'images/boss17.png',
                'gambar_tambahan' => 'images/show16.png'
            ],
        ];


        return view('pengelolaan', [
            'username' => session('username'),
            'products' => $items
        ]);
    }
}
