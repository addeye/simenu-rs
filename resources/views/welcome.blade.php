<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex" />
    <title>{{ $setting->name ?? 'Sistem Informasi Rumah Sakit' }}</title>
    <meta name="keywords" content="singular theme, free template, web design, clean, simple, professional, CSS, HTML" />
    <meta name="description" content="Singular Theme, free CSS template from templatemo.com" />
    <link href="/css/index_style.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <div id="templatemo_header_wrapper">
        <div id="templatemo_header">
            <div id="site_title">
                <img src="{{$setting->logo ? asset('storage/'.$setting->logo) : '/images/logo_atas.png'}}" alt=""><br>
                <a href="http://rsud.pacitankab.go.id/">RSUD dr DARSONO KABUPATEN PACITAN</a>
            </div>
            <p id="intro_text">{{ $setting->intro ?? "Selamat Datang di Sistem Informasi Rumah Sakit, Silahkan Pilih Modul di Bawah ini." }}</p>
        </div>
    </div>
    <div id="templatemo_main_wrapper">
        <div id="templatemo_main">
            <div id="content">
                <div id="home" class="section">
                    <ul id="templatemo_menu">
                        @foreach ($menus as $item)
                        <li>
                            <a href="{{$item->link}}">
                                <img style="width: 92px; height: 92px; object-fit: contain; object-position: center;" src="{{asset('storage/'.$item->gambar)}}" alt="">
                                <span>{{$item->nama}}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="templatemo_footer_wrapper">
        <div id="templatemo_footer">
            <p>{{$setting->footer ?? 'Copyright © 2016 Rumah Sakit Umum Daerah dr DARSONO Kabupaten Pacitan '}}</p>
        </div>
    </div>

</body>

</html>
