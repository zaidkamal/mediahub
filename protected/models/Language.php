<?php
class Language {
  const LANGUAGES = array(
    "abk" => "Northwest Caucasian"
    "aar" => "Afar"
    "afr" => "Afrikaans"
    "aka" => "Akan"
    "alb" => "Albanian"
    "gsw" => "Alemannic, Swiss German, Alsatian"
    "amh" => "Amharic"
    "ara" => "Arabic"
    "arg" => "Aragonese"
    "arm" => "Armenian"
    "asm" => "Assamese"
    "ava" => "Avaric"
    "ave" => "Avestan"
    "aym" => "Aymara"
    "aze" => "Azerbaijani"
    "bam" => "Bambara"
    "bak" => "Bashkir"
    "baq" => "Basque"
    "bel" => "Belarusian"
    "ben" => "Bengali"
    "bih" => "Bihari"
    "bis" => "Bislama"
    "bjn" => "Banjar"
    "bos" => "Bosnian"
    "bre" => "Breton"
    "bul" => "Bulgarian"
    "bur" => "Burmese"
    "cat" => "Catalan; Valencian"
    "cha" => "Chamorro"
    "che" => "Chechen"
    "nya" => "Chichewa; Chewa; Nyanja"
    "chi" => "Chinese"
    "chv" => "Chuvash"
    "cor" => "Cornish"
    "cos" => "Corsican"
    "cre" => "Cree"
    "hrv" => "Croatian"
    "cze" => "Czech"
    "dan" => "Danish"
    "day" => "Dayak"
    "div" => "Divehi; Dhivehi; Maldivian;"
    "dut" => "Dutch"
    "dzo" => "Dzongkha"
    "eng" => "English"
    "epo" => "Esperanto"
    "est" => "Estonian"
    "ewe" => "Ewe"
    "fao" => "Faroese"
    "fij" => "Fijian"
    "fin" => "Finnish"
    "fre" => "French"
    "ful" => "Fula; Fulah; Pulaar; Pular"
    "glg" => "Galician"
    "geo" => "Georgian"
    "ger" => "German"
    "gre" => "Greek, Modern"
    "grn" => "Guaraní"
    "guj" => "Gujarati"
    "hat" => "Haitian; Haitian Creole"
    "hau" => "Hausa"
    "heb" => "Hebrew (modern)"
    "her" => "Herero"
    "hin" => "Hindi"
    "hmo" => "Hiri Motu"
    "hun" => "Hungarian"
    "ina" => "Interlingua"
    "ind" => "Indonesian"
    "ile" => "Interlingue"
    "gle" => "Irish"
    "ibo" => "Igbo"
    "ipk" => "Inupiaq"
    "ido" => "Ido"
    "ice" => "Icelandic"
    "ita" => "Italian"
    "iku" => "Inuktitut"
    "jpn" => "Japanese"
    "jav" => "Javanese"
    "kal" => "Kalaallisut, Greenlandic"
    "kan" => "Kannada"
    "kau" => "Kanuri"
    "kas" => "Kashmiri"
    "kaz" => "Kazakh"
    "khm" => "Khmer"
    "kik" => "Kikuyu, Gikuyu"
    "kin" => "Kinyarwanda"
    "kir" => "Kyrgyz language"
    "kom" => "Komi"
    "kon" => "Kongo"
    "kor" => "Korean"
    "kur" => "Kurdish"
    "kua" => "Kwanyama, Kuanyama"
    "lat" => "Latin"
    "ltz" => "Luxembourgish, Letzeburgesch"
    "lug" => "Ganda"
    "lim" => "Limburgish, Limburgan, Limburger"
    "lin" => "Lingala"
    "lao" => "Lao"
    "lit" => "Lithuanian"
    "lub" => "Luba-Katanga"
    "lav" => "Latvian"
    "glv" => "Manx"
    "mac" => "Macedonian"
    "mlg" => "Malagasy"
    "may" => "Malay"
    "mal" => "Malayalam"
    "mlt" => "Maltese"
    "mao" => "Māori"
    "mar" => "Marathi (Marāṭhī)"
    "mah" => "Marshallese"
    "mon" => "Mongolian"
    "nau" => "Nauru"
    "nav" => "Navajo, Navaho"
    "nob" => "Norwegian Bokmål"
    "nde" => "North Ndebele"
    "nep" => "Nepali"
    "ndo" => "Ndonga"
    "nno" => "Norwegian Nynorsk"
    "nor" => "Norwegian"
    "iii" => "Nuosu"
    "nbl" => "South Ndebele"
    "oci" => "Occitan"
    "oji" => "Ojibwe, Ojibwa"
    "chu" => "Old Church Slavonic, Church Slavic, Church Slavonic, Old Bulgarian, Old Slavonic"
    "orm" => "Oromo"
    "ori" => "Oriya"
    "oss" => "Ossetian, Ossetic"
    "pan" => "Panjabi, Punjabi"
    "pli" => "Pāli"
    "per" => "Persian"
    "pol" => "Polish"
    "pus" => "Pashto, Pushto"
    "por" => "Portuguese"
    "que" => "Quechua"
    "roh" => "Romansh"
    "run" => "Kirundi"
    "rum" => "Romanian, Moldavian, Moldovan"
    "rus" => "Russian"
    "san" => "Sanskrit (Saṁskṛta)"
    "srd" => "Sardinian"
    "snd" => "Sindhi"
    "sme" => "Northern Sami"
    "smo" => "Samoan"
    "sag" => "Sango"
    "srp" => "Serbian"
    "gla" => "Scottish Gaelic; Gaelic"
    "sna" => "Shona"
    "sin" => "Sinhala, Sinhalese"
    "slo" => "Slovak"
    "slv" => "Slovene"
    "som" => "Somali"
    "sot" => "Southern Sotho"
    "spa" => "Spanish; Castilian"
    "sun" => "Sundanese"
    "swa" => "Swahili"
    "ssw" => "Swati"
    "swe" => "Swedish"
    "tam" => "Tamil"
    "tel" => "Telugu"
    "tgk" => "Tajik"
    "tha" => "Thai"
    "tir" => "Tigrinya"
    "tib" => "Tibetan Standard, Tibetan, Central"
    "tuk" => "Turkmen"
    "tgl" => "Tagalog"
    "tsn" => "Tswana"
    "ton" => "Tonga (Tonga Islands)"
    "tur" => "Turkish"
    "tso" => "Tsonga"
    "tat" => "Tatar"
    "twi" => "Twi"
    "tah" => "Tahitian"
    "uig" => "Uighur, Uyghur"
    "ukr" => "Ukrainian"
    "urd" => "Urdu"
    "uzb" => "Uzbek"
    "ven" => "Venda"
    "vie" => "Vietnamese"
    "vol" => "Volapük"
    "wln" => "Walloon"
    "wel" => "Welsh"
    "wol" => "Wolof"
    "fry" => "Western Frisian"
    "xho" => "Xhosa"
    "yid" => "Yiddish"
    "yor" => "Yoruba"
    "zha" => "Zhuang, Chuang"
    "zul" => "Zulu"
  );
}
