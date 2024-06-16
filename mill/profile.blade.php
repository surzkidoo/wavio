<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if (checkFeature('seo'))
        @if ($vcard->meta_description)
            <meta name="description" content="{{ $vcard->meta_description }}">
        @endif
        @if ($vcard->meta_keyword)
            <meta name="keywords" content="{{ $vcard->meta_keyword }}">
        @endif
    @else
        <meta name="description" content="{{ $vcard->description }}">
        <meta name="keywords" content="">
    @endif
    <meta property="og:image" content="{{ $vcard->cover_url }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if (checkFeature('seo') && $vcard->site_title && $vcard->home_title)
        <title>{{ $vcard->home_title }} | {{ $vcard->site_title }}</title>
    @else
        <title>{{ $vcard->name }} | {{ getAppName() }}</title>
    @endif
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('pwa/1.json') }}">

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--    @if (App::environment('production')) --}}
    {{--    @endif --}}

    <!-- Favicon -->
    <link rel="icon" href="{{ getFaviconUrl() }}" type="image/png">

    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('assets/css/vcard1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/css/slick-theme.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/third-party.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-vcard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">

    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    @if (checkFeature('custom-fonts') && $vcard->font_family)
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family={{ $vcard->font_family }}">
    @endif
    @if ($vcard->font_family || $vcard->font_size || $vcard->custom_css)
        <style>
            @if (checkFeature('custom-fonts'))
                @if ($vcard->font_family)
                    body {
                        font-family: {{ $vcard->font_family }};
                    }
                @endif
                @if ($vcard->font_size)
                    div>h4 {
                        font-size: {{ $vcard->font_size }}px !important;
                    }
                @endif
            @endif
            @if (isset(checkFeature('advanced')->custom_css))
                {!! $vcard->custom_css !!}
            @endif
        </style>
    @endif
    <link rel="stylesheet" href="profille.css">
</head>

<body>


    <div class="all">

        @include('vcards.password')

        <div class="bio">
            <div class="bg">
                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect x="2" y="2" width="46" height="46" rx="23" fill="black" />
                    <rect x="2" y="2" width="46" height="46" rx="23" stroke="white" stroke-width="4" />
                    <rect x="6" y="13" width="37" height="23" fill="url(#pattern0_133_28)" />
                    <defs>
                        <pattern id="pattern0_133_28" patternContentUnits="objectBoundingBox" width="1"
                            height="1">
                            <use xlink:href="#image0_133_28"
                                transform="matrix(0.00327885 0 0 0.00531915 -0.157963 0)" />
                        </pattern>
                        <image id="image0_133_28" width="406" height="188"
                            xlink:href="data:image/png;base64,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" />
                    </defs>
                </svg>

            </div>

            <div class="prof-card">
                <div class="img-c">
                    <img src="{{ $vcard->profile_url }}" alt="">
                </div>

                <h1> {{ ucwords($vcard->first_name . ' ' . $vcard->last_name) }}
                    @if ($vcard->is_verified)
                        <i class="verification-icon bi-patch-check-fill"></i>
                    @endif
                </h1>

                <p>{{ ucwords($vcard->job_title) }} {{ ucwords($vcard->company) }}</p>
            </div>

            <div class="acn-container">
                <p>{!! $vcard->description !!}</p>
             
                    @if (
                            !isset($userSetting['enable_contact']) ||
                                (!$userSetting['enable_contact'] && $userSetting['enable_contact'] != 0) ||
                                $userSetting['enable_contact'] == 1)
                                <a href="{{ route('add-contact', $vcard->id) }}>
 <button>Save to Contact</button>
</a>
                                @endif

                   
               
            </div>

            @if (checkFeature('social_links') && isset($vcard->socialLink) && getSocialLink($vcard))
                <div class="socail-con">

                    <p>Follow my Socials</p>

                    <div class="social">

                        @foreach (getSocialLink($vcard) as $value)
                            {!! $value !!}
                        @endforeach

                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.39587 11.5C2.39587 7.20862 2.39587 5.06196 3.72892 3.72892C5.06196 2.39587 7.20767 2.39587 11.5 2.39587C15.7915 2.39587 17.9381 2.39587 19.2712 3.72892C20.6042 5.06196 20.6042 7.20767 20.6042 11.5C20.6042 15.7915 20.6042 17.9381 19.2712 19.2712C17.9381 20.6042 15.7924 20.6042 11.5 20.6042C7.20862 20.6042 5.06196 20.6042 3.72892 19.2712C2.39587 17.9381 2.39587 15.7924 2.39587 11.5Z"
                                stroke="#D45E57" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M16.7785 6.22925H16.7689M15.8125 11.5001C15.8125 12.6438 15.3581 13.7407 14.5494 14.5495C13.7406 15.3582 12.6437 15.8126 11.5 15.8126C10.3563 15.8126 9.25935 15.3582 8.4506 14.5495C7.64185 13.7407 7.1875 12.6438 7.1875 11.5001C7.1875 10.3563 7.64185 9.25943 8.4506 8.45068C9.25935 7.64193 10.3563 7.18758 11.5 7.18758C12.6437 7.18758 13.7406 7.64193 14.5494 8.45068C15.3581 9.25943 15.8125 10.3563 15.8125 11.5001Z"
                                stroke="#D45E57" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21.0833 11.5C21.0833 6.20996 16.79 1.91663 11.5 1.91663C6.20996 1.91663 1.91663 6.20996 1.91663 11.5C1.91663 16.1383 5.21329 20.0004 9.58329 20.8916V14.375H7.66663V11.5H9.58329V9.10413C9.58329 7.25454 11.0879 5.74996 12.9375 5.74996H15.3333V8.62496H13.4166C12.8895 8.62496 12.4583 9.05621 12.4583 9.58329V11.5H15.3333V14.375H12.4583V21.0354C17.2979 20.5562 21.0833 16.4737 21.0833 11.5Z"
                                fill="#0C40C4" />
                        </svg>


                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_133_177)">
                                <path
                                    d="M0 1.50412C0 0.673313 0.6575 0 1.46875 0H18.5312C19.3425 0 20 0.673313 20 1.50412V19.4959C20 20.3267 19.3425 21 18.5312 21H1.46875C0.6575 21 0 20.3267 0 19.4959V1.50412ZM6.17875 17.5796V8.09681H3.1775V17.5796H6.17875ZM4.67875 6.80138C5.725 6.80138 6.37625 6.07425 6.37625 5.16337C6.3575 4.23281 5.72625 3.52538 4.69875 3.52538C3.67125 3.52538 3 4.23413 3 5.16337C3 6.07425 3.65125 6.80138 4.65875 6.80138H4.67875ZM10.8138 17.5796V12.2837C10.8138 12.0002 10.8337 11.7167 10.9137 11.5146C11.13 10.9489 11.6238 10.3622 12.4538 10.3622C13.54 10.3622 13.9738 11.2311 13.9738 12.5068V17.5796H16.975V12.1406C16.975 9.22688 15.495 7.87238 13.52 7.87238C11.9275 7.87238 11.2137 8.79113 10.8138 9.43819V9.471H10.7938L10.8138 9.43819V8.09681H7.81375C7.85125 8.98669 7.81375 17.5796 7.81375 17.5796H10.8138Z"
                                    fill="#0A66C2" />
                            </g>
                            <defs>
                                <clipPath id="clip0_133_177">
                                    <rect width="20" height="21" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.66329 20.6425C9.58329 20.9204 10.5129 21.0833 11.5 21.0833C14.0416 21.0833 16.4792 20.0736 18.2764 18.2764C20.0736 16.4792 21.0833 14.0416 21.0833 11.5C21.0833 10.2415 20.8354 8.99528 20.3538 7.83258C19.8722 6.66987 19.1663 5.61341 18.2764 4.72352C17.3865 3.83362 16.33 3.12772 15.1673 2.64611C14.0046 2.16451 12.7585 1.91663 11.5 1.91663C10.2415 1.91663 8.99528 2.16451 7.83258 2.64611C6.66987 3.12772 5.61341 3.83362 4.72352 4.72352C2.9263 6.52074 1.91663 8.9583 1.91663 11.5C1.91663 15.5729 4.47538 19.0708 8.08829 20.4508C8.00204 19.7033 7.91579 18.467 8.08829 17.6141L9.19038 12.88C9.19038 12.88 8.91246 12.3241 8.91246 11.4425C8.91246 10.12 9.73663 9.13288 10.6758 9.13288C11.5 9.13288 11.8833 9.73663 11.8833 10.5129C11.8833 11.337 11.337 12.5158 11.0591 13.6466C10.8962 14.5858 11.5575 15.41 12.5158 15.41C14.2216 15.41 15.5441 13.5891 15.5441 11.0208C15.5441 8.72079 13.8958 7.14913 11.5287 7.14913C8.82621 7.14913 7.23538 9.16163 7.23538 11.2795C7.23538 12.1037 7.50371 12.9375 7.94454 13.4837C8.03079 13.5412 8.03079 13.6179 8.00204 13.7616L7.72413 14.8062C7.72413 14.9691 7.61871 15.0266 7.45579 14.9116C6.22913 14.375 5.51996 12.6308 5.51996 11.222C5.51996 8.19371 7.66663 5.44329 11.8066 5.44329C15.1033 5.44329 17.6716 7.81038 17.6716 10.9537C17.6716 14.2504 15.6304 16.8954 12.7075 16.8954C11.7779 16.8954 10.8675 16.397 10.5416 15.8125L9.89954 18.0837C9.67913 18.9079 9.07538 20.01 8.66329 20.6712V20.6425Z"
                                fill="#CB1F27" />
                        </svg>

                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.58329 14.375L14.557 11.5L9.58329 8.62496V14.375ZM20.6616 6.87121C20.7862 7.32163 20.8725 7.92538 20.93 8.69204C20.997 9.45871 21.0258 10.12 21.0258 10.695L21.0833 11.5C21.0833 13.5987 20.93 15.1416 20.6616 16.1287C20.422 16.9912 19.8662 17.547 19.0037 17.7866C18.5533 17.9112 17.7291 17.9975 16.4641 18.055C15.2183 18.122 14.0779 18.1508 13.0237 18.1508L11.5 18.2083C7.48454 18.2083 4.98329 18.055 3.99621 17.7866C3.13371 17.547 2.57788 16.9912 2.33829 16.1287C2.21371 15.6783 2.12746 15.0745 2.06996 14.3079C2.00288 13.5412 1.97413 12.88 1.97413 12.305L1.91663 11.5C1.91663 9.40121 2.06996 7.85829 2.33829 6.87121C2.57788 6.00871 3.13371 5.45288 3.99621 5.21329C4.44663 5.08871 5.27079 5.00246 6.53579 4.94496C7.78163 4.87788 8.92204 4.84913 9.97621 4.84913L11.5 4.79163C15.5154 4.79163 18.0166 4.94496 19.0037 5.21329C19.8662 5.45288 20.422 6.00871 20.6616 6.87121Z"
                                fill="#D51F1F" />
                        </svg>



                    </div>

                </div>
            @endif
        </div>

        @if ((isset($managesection) && $managesection['contact_list']) || empty($managesection))

            <div class="contact">
                <h4>Contact Information</h4>



                <div class="contact-con">
                    @if ($vcard->phone)
                        <div class="contact-item">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="48" height="48" rx="10" fill="black"
                                    fill-opacity="0.1" />
                                <path
                                    d="M27.556 24.906L27.101 25.359C27.101 25.359 26.018 26.435 23.063 23.497C20.108 20.559 21.191 19.483 21.191 19.483L21.477 19.197C22.184 18.495 22.251 17.367 21.634 16.543L20.374 14.86C19.61 13.84 18.135 13.705 17.26 14.575L15.69 16.135C15.257 16.567 14.967 17.125 15.002 17.745C15.092 19.332 15.81 22.745 19.814 26.727C24.061 30.949 28.046 31.117 29.675 30.965C30.191 30.917 30.639 30.655 31 30.295L32.42 28.883C33.38 27.93 33.11 26.295 31.882 25.628L29.972 24.589C29.166 24.152 28.186 24.28 27.556 24.906Z"
                                    fill="#0075E2" />
                            </svg>
                            <div class="kv">


                                <p>My Phone</p>
                                <h5> <a href="tel:+{{ $vcard->region_code }}{{ $vcard->phone }}">+
                                        {{ $vcard->region_code }}
                                        {{ $vcard->phone }}</a></h5>
                            </div>
                        </div>
                    @endif
                    @if ($vcard->alternative_phone)

                        <div class="contact-item">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="48" height="48" rx="10" fill="black"
                                    fill-opacity="0.1" />
                                <path
                                    d="M33.2233 21.4725L33.4708 22.575C33.5083 22.7423 33.5083 22.908 33.4768 23.064C33.5052 23.1748 33.5078 23.2906 33.4846 23.4025C33.4613 23.5145 33.4128 23.6196 33.3426 23.71C33.2725 23.8003 33.1827 23.8734 33.08 23.9236C32.9772 23.9739 32.8644 24 32.7501 24H31.0588L29.9466 22.5173V22.5157C29.7686 22.2776 29.5374 22.0844 29.2715 21.9514C29.0056 21.8185 28.7123 21.7495 28.4151 21.75H28.2501V20.4825C28.2501 19.941 27.8091 19.5 27.2676 19.5H26.2326C25.6911 19.5 25.2501 19.941 25.2501 20.4825V21.7425H20.7501V20.4825C20.7501 19.941 20.3091 19.5 19.7676 19.5H18.7326C18.1911 19.5 17.7501 19.941 17.7501 20.4825V21.75H17.5851C16.9791 21.75 16.4128 22.0357 16.0476 22.5225L14.9406 24H13.2501C13.1357 24 13.0229 23.9739 12.9202 23.9236C12.8175 23.8734 12.7276 23.8003 12.6575 23.71C12.5874 23.6196 12.5388 23.5145 12.5156 23.4025C12.4923 23.2906 12.4949 23.1748 12.5233 23.064C12.4905 22.9024 12.4925 22.7357 12.5293 22.575L12.7693 21.4725C13.0367 20.2753 13.7038 19.2047 14.6608 18.4372C15.6177 17.6697 16.8076 17.251 18.0343 17.25H27.9658C29.1919 17.2501 30.3813 17.6687 31.3373 18.4365C32.2933 19.2042 32.9586 20.2753 33.2233 21.4725Z"
                                    fill="#0075E2" />
                                <path
                                    d="M29.345 22.965L32.09 26.625C33.0054 27.8424 33.5002 29.3244 33.5 30.8475V33.33C33.5 33.975 32.975 34.5 32.33 34.5H13.67C13.025 34.5 12.5 33.975 12.5 33.33V30.8475C12.5 29.325 12.995 27.84 13.91 26.625L16.6475 22.9725C16.8725 22.6725 17.2175 22.5 17.585 22.5H18.2675C18.395 22.5 18.5 22.395 18.5 22.2675V20.4825C18.5 20.355 18.605 20.25 18.7325 20.25H19.7675C19.895 20.25 20 20.355 20 20.4825V22.2675C20 22.395 20.105 22.5 20.2325 22.5H25.7675C25.895 22.5 26 22.395 26 22.2675V20.4825C26 20.355 26.105 20.25 26.2325 20.25H27.2675C27.395 20.25 27.5 20.355 27.5 20.4825V22.2675C27.5 22.395 27.605 22.5 27.7325 22.5H28.415C28.7825 22.5 29.1275 22.6725 29.345 22.965ZM21.2735 26.25C21.401 26.25 21.5068 26.145 21.4992 26.016V24.984C21.4991 24.9221 21.4744 24.8628 21.4308 24.819C21.3871 24.7752 21.3279 24.7504 21.266 24.75H20.234C20.172 24.7502 20.1126 24.7749 20.0688 24.8188C20.0249 24.8626 20.0002 24.922 20 24.984V26.016C20 26.1442 20.105 26.25 20.2415 26.25H21.2735ZM23.5235 26.25C23.5539 26.2502 23.5841 26.2443 23.6122 26.2325C23.6403 26.2207 23.6657 26.2034 23.6868 26.1815C23.708 26.1596 23.7245 26.1337 23.7354 26.1052C23.7463 26.0768 23.7512 26.0464 23.75 26.016V24.984C23.7496 24.9221 23.7248 24.8628 23.681 24.819C23.6372 24.7752 23.5779 24.7504 23.516 24.75H22.484C22.422 24.7502 22.3626 24.7749 22.3188 24.8188C22.2749 24.8626 22.2502 24.922 22.25 24.984V26.016C22.25 26.1442 22.355 26.25 22.4915 26.25H23.5235ZM24.7415 26.25H25.7735C25.8039 26.2502 25.8341 26.2443 25.8622 26.2325C25.8903 26.2207 25.9157 26.2034 25.9368 26.1815C25.958 26.1596 25.9745 26.1337 25.9854 26.1052C25.9963 26.0768 26.0012 26.0464 26 26.016V24.984C25.9996 24.9221 25.9748 24.8628 25.931 24.819C25.8872 24.7752 25.8279 24.7504 25.766 24.75H24.734C24.672 24.7502 24.6126 24.7749 24.5688 24.8188C24.5249 24.8626 24.5002 24.922 24.5 24.984V26.016C24.5 26.1442 24.605 26.25 24.7415 26.25ZM21.2735 28.5C21.401 28.5 21.5068 28.395 21.4992 28.266V27.234C21.4991 27.1721 21.4744 27.1128 21.4308 27.069C21.3871 27.0252 21.3279 27.0004 21.266 27H20.234C20.172 27.0002 20.1126 27.0249 20.0688 27.0688C20.0249 27.1126 20.0002 27.172 20 27.234V28.266C20 28.3942 20.105 28.5 20.2415 28.5H21.2735ZM22.4915 28.5H23.5235C23.5539 28.5002 23.5841 28.4943 23.6122 28.4825C23.6403 28.4707 23.6657 28.4534 23.6868 28.4315C23.708 28.4096 23.7245 28.3837 23.7354 28.3552C23.7463 28.3268 23.7512 28.2964 23.75 28.266V27.234C23.7496 27.1721 23.7248 27.1128 23.681 27.069C23.6372 27.0252 23.5779 27.0004 23.516 27H22.484C22.422 27.0002 22.3626 27.0249 22.3188 27.0688C22.2749 27.1126 22.2502 27.172 22.25 27.234V28.266C22.25 28.3942 22.355 28.5 22.4915 28.5ZM25.7735 28.5C25.8039 28.5002 25.8341 28.4943 25.8622 28.4825C25.8903 28.4707 25.9157 28.4534 25.9368 28.4315C25.958 28.4096 25.9745 28.3837 25.9854 28.3552C25.9963 28.3268 26.0012 28.2964 26 28.266V27.234C25.9996 27.1721 25.9748 27.1128 25.931 27.069C25.8872 27.0252 25.8279 27.0004 25.766 27H24.734C24.672 27.0002 24.6126 27.0249 24.5688 27.0688C24.5249 27.1126 24.5002 27.172 24.5 27.234V28.266C24.5 28.3942 24.605 28.5 24.7415 28.5H25.7735ZM20.2415 30.75H21.2735C21.401 30.75 21.5068 30.645 21.4992 30.516V29.484C21.4991 29.4221 21.4744 29.3628 21.4308 29.319C21.3871 29.2752 21.3279 29.2504 21.266 29.25H20.234C20.172 29.2502 20.1126 29.2749 20.0688 29.3188C20.0249 29.3626 20.0002 29.422 20 29.484V30.516C20 30.6442 20.105 30.75 20.2415 30.75ZM23.5235 30.75C23.5539 30.7502 23.5841 30.7443 23.6122 30.7325C23.6403 30.7207 23.6657 30.7034 23.6868 30.6815C23.708 30.6596 23.7245 30.6337 23.7354 30.6052C23.7463 30.5768 23.7512 30.5464 23.75 30.516V29.484C23.7496 29.4221 23.7248 29.3628 23.681 29.319C23.6372 29.2752 23.5779 29.2504 23.516 29.25H22.484C22.422 29.2502 22.3626 29.2749 22.3188 29.3188C22.2749 29.3626 22.2502 29.422 22.25 29.484V30.516C22.25 30.6442 22.355 30.75 22.4915 30.75H23.5235ZM24.7415 30.75H25.7735C25.8039 30.7502 25.8341 30.7443 25.8622 30.7325C25.8903 30.7207 25.9157 30.7034 25.9368 30.6815C25.958 30.6596 25.9745 30.6337 25.9854 30.6052C25.9963 30.5768 26.0012 30.5464 26 30.516V29.484C25.9996 29.4221 25.9748 29.3628 25.931 29.319C25.8872 29.2752 25.8279 29.2504 25.766 29.25H24.734C24.672 29.2502 24.6126 29.2749 24.5688 29.3188C24.5249 29.3626 24.5002 29.422 24.5 29.484V30.516C24.5 30.6442 24.605 30.75 24.7415 30.75Z"
                                    fill="#0075E2" />
                            </svg>

                            <div class="kv">


                                <p>Alternate Phone</p>
                                <h5> <a href="tel:+{{ $vcard->alternative_region_code }} {{ $vcard->alternative_phone }}"
                                        class="">+{{ $vcard->alternative_region_code }}
                                        {{ $vcard->alternative_phone }}</a> </h5>
                            </div>
                        </div>
                    @endif

                    @if ($vcard->email)
                        <div class="contact-item">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="48" height="48" rx="10" fill="black"
                                    fill-opacity="0.1" />
                                <path
                                    d="M31.875 15.75H16.125C15.429 15.7507 14.7618 16.0275 14.2697 16.5197C13.7775 17.0118 13.5007 17.679 13.5 18.375V29.625C13.5007 30.321 13.7775 30.9882 14.2697 31.4803C14.7618 31.9725 15.429 32.2493 16.125 32.25H31.875C32.571 32.2493 33.2382 31.9725 33.7303 31.4803C34.2225 30.9882 34.4993 30.321 34.5 29.625V18.375C34.4993 17.679 34.2225 17.0118 33.7303 16.5197C33.2382 16.0275 32.571 15.7507 31.875 15.75ZM31.2103 20.092L24.4603 25.342C24.3287 25.4444 24.1667 25.4999 24 25.4999C23.8333 25.4999 23.6713 25.4444 23.5397 25.342L16.7897 20.092C16.7104 20.0321 16.6438 19.9571 16.5937 19.8712C16.5437 19.7854 16.5112 19.6904 16.4981 19.5919C16.4851 19.4934 16.4918 19.3933 16.5178 19.2973C16.5438 19.2014 16.5886 19.1116 16.6496 19.0332C16.7106 18.9547 16.7866 18.8892 16.8731 18.8403C16.9597 18.7915 17.0551 18.7603 17.1538 18.7487C17.2525 18.737 17.3525 18.7451 17.448 18.7725C17.5436 18.7998 17.6327 18.8459 17.7103 18.908L24 23.7998L30.2897 18.908C30.447 18.7892 30.6447 18.7371 30.84 18.763C31.0354 18.7888 31.2128 18.8905 31.3338 19.0461C31.4547 19.2017 31.5096 19.3987 31.4865 19.5944C31.4634 19.7901 31.3642 19.9689 31.2103 20.092Z"
                                    fill="#0075E2" />
                            </svg>

                            <div class="kv">


                                <p>My Email</p>
                                <h5> <a href="mailto:{{ $vcard->email }}" class="">{{ $vcard->email }}</a>
                                </h5>
                            </div>
                        </div>
                    @endif

                    @if ($vcard->alternative_email)
                        <div class="contact-item">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="48" height="48" rx="10" fill="black"
                                    fill-opacity="0.1" />
                                <path
                                    d="M31 16H17C16.2044 16 15.4413 16.3161 14.8787 16.8787C14.3161 17.4413 14 18.2044 14 19V29C14 29.7956 14.3161 30.5587 14.8787 31.1213C15.4413 31.6839 16.2044 32 17 32H31C31.7956 32 32.5587 31.6839 33.1213 31.1213C33.6839 30.5587 34 29.7956 34 29V19C34 18.2044 33.6839 17.4413 33.1213 16.8787C32.5587 16.3161 31.7956 16 31 16ZM31 18L24.5 22.47C24.348 22.5578 24.1755 22.604 24 22.604C23.8245 22.604 23.652 22.5578 23.5 22.47L17 18H31Z"
                                    fill="#0075E2" />
                            </svg>

                            <div class="kv">


                                <p>Alternate Email</p>
                                <h5> <a href="mailto:{{ $vcard->alternative_email }}"
                                        class="">{{ $vcard->alternative_email }}</a></h5>
                            </div>
                        </div>
                    @endif

                    @if ($vcard->dob)
                        <div class="contact-item">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="48" height="48" rx="10" fill="black"
                                    fill-opacity="0.1" />
                                <g clip-path="url(#clip0_0_1)">
                                    <path
                                        d="M24.6 14.2C24.4269 14.0702 24.2164 14 24 14C23.7836 14 23.5731 14.0702 23.4 14.2C22.9831 14.5188 22.5989 14.8782 22.253 15.273C21.73 15.862 21 16.855 21 18C21 18.7956 21.3161 19.5587 21.8787 20.1213C22.4413 20.6839 23.2044 21 24 21H18C17.2044 21 16.4413 21.3161 15.8787 21.8787C15.3161 22.4413 15 23.2044 15 24V26C15 27.236 16.411 27.942 17.4 27.2L18.067 26.7C18.2401 26.5702 18.4506 26.5 18.667 26.5C18.8834 26.5 19.0939 26.5702 19.267 26.7L19.533 26.9C20.0523 27.2895 20.6839 27.5 21.333 27.5C21.9821 27.5 22.6137 27.2895 23.133 26.9L23.4 26.7C23.5731 26.5702 23.7836 26.5 24 26.5C24.2164 26.5 24.4269 26.5702 24.6 26.7L24.867 26.9C25.3863 27.2895 26.0179 27.5 26.667 27.5C27.3161 27.5 27.9477 27.2895 28.467 26.9L28.733 26.7C28.9061 26.5702 29.1166 26.5 29.333 26.5C29.5494 26.5 29.7599 26.5702 29.933 26.7L30.6 27.2C31.589 27.942 33 27.236 33 26V24C33 23.2044 32.6839 22.4413 32.1213 21.8787C31.5587 21.3161 30.7956 21 30 21H24C24.7956 21 25.5587 20.6839 26.1213 20.1213C26.6839 19.5587 27 18.7956 27 18C27 16.855 26.27 15.862 25.747 15.273C25.401 14.883 25.017 14.513 24.6 14.2ZM16 29.415V32C16 32.5304 16.2107 33.0391 16.5858 33.4142C16.9609 33.7893 17.4696 34 18 34H30C30.5304 34 31.0391 33.7893 31.4142 33.4142C31.7893 33.0391 32 32.5304 32 32V29.415C31.7673 29.4993 31.5172 29.5238 31.2725 29.4863C31.0279 29.4487 30.7967 29.3503 30.6 29.2L29.933 28.7C29.7599 28.5702 29.5494 28.5 29.333 28.5C29.1166 28.5 28.9061 28.5702 28.733 28.7L28.467 28.9C27.9477 29.2895 27.3161 29.5 26.667 29.5C26.0179 29.5 25.3863 29.2895 24.867 28.9L24.6 28.7C24.4269 28.5702 24.2164 28.5 24 28.5C23.7836 28.5 23.5731 28.5702 23.4 28.7L23.133 28.9C22.6137 29.2895 21.9821 29.5 21.333 29.5C20.6839 29.5 20.0523 29.2895 19.533 28.9L19.267 28.7C19.0939 28.5702 18.8834 28.5 18.667 28.5C18.4506 28.5 18.2401 28.5702 18.067 28.7L17.4 29.2C17.2033 29.3503 16.9721 29.4487 16.7275 29.4863C16.4828 29.5238 16.2327 29.4993 16 29.415Z"
                                        fill="#0075E2" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_0_1">
                                        <rect width="24" height="24" fill="white"
                                            transform="translate(12 12)" />
                                    </clipPath>
                                </defs>
                            </svg>


                            <div class="kv">


                                <p>Date of Birth</p>
                                <h5>February 20th</h5>
                            </div>
                        </div>
                    @endif

                    @if ($vcard->location)
                        <div class="contact-item">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="48" height="48" rx="10" fill="black"
                                    fill-opacity="0.1" />
                                <path
                                    d="M24 23.5C23.337 23.5 22.7011 23.2366 22.2322 22.7678C21.7634 22.2989 21.5 21.663 21.5 21C21.5 20.337 21.7634 19.7011 22.2322 19.2322C22.7011 18.7634 23.337 18.5 24 18.5C24.663 18.5 25.2989 18.7634 25.7678 19.2322C26.2366 19.7011 26.5 20.337 26.5 21C26.5 21.3283 26.4353 21.6534 26.3097 21.9567C26.1841 22.26 25.9999 22.5356 25.7678 22.7678C25.5356 22.9999 25.26 23.1841 24.9567 23.3097C24.6534 23.4353 24.3283 23.5 24 23.5ZM24 14C22.1435 14 20.363 14.7375 19.0503 16.0503C17.7375 17.363 17 19.1435 17 21C17 26.25 24 34 24 34C24 34 31 26.25 31 21C31 19.1435 30.2625 17.363 28.9497 16.0503C27.637 14.7375 25.8565 14 24 14Z"
                                    fill="#0075E2" />
                            </svg>


                            <div class="kv">


                                <p>Address</p>
                                <h5>{!! ucwords($vcard->location) !!}</h5>
                            </div>
                        </div>
                    @endif

                </div>


            </div>
        @endif

        @if (isset($vcard['show_qr_code']) && $vcard['show_qr_code'] == 1)
            <div class="qr">
                <h4>QR Code</h4>

                <div class="qr-container">
                    @if (isset($customQrCode['applySetting']) && $customQrCode['applySetting'] == 1)
                        {!! QrCode::color(
                            $qrcodeColor['qrcodeColor']->red(),
                            $qrcodeColor['qrcodeColor']->green(),
                            $qrcodeColor['qrcodeColor']->blue(),
                        )->backgroundColor(
                                $qrcodeColor['background_color']->red(),
                                $qrcodeColor['background_color']->green(),
                                $qrcodeColor['background_color']->blue(),
                            )->style($customQrCode['style'])->eye($customQrCode['eye_style'])->size(130)->format('svg')->generate(Request::url()) !!}
                    @else
                        {!! QrCode::size(130)->format('svg')->generate(Request::url()) !!}
                    @endif
                </div>

                <h2>Scan QR Code</h2>
            </div>
        @endif

        @if ((isset($managesection) && $managesection['services']) || empty($managesection))
            <div class="service">
                <h4>Services</h4>

                <div class="service-con">
                    @foreach ($vcard->services as $service)
                        <div class="service-item">
                            <img src="{{ $service->service_icon }}" alt="{{ $service->name }}">

                            <div>
                                <h1>{{ ucwords($service->name) }}</h1>

                                <p>{{ \Illuminate\Support\Str::length($service->description) > 80 ? 'more' : '' }}">
                                    {!! $service->description !!}</p>
                                <a href="{{ $service->service_url ?? 'javascript:void(0)' }}"> <button>Book Service
                                        >>></button></a>

                            </div>
                        </div>
                    @endforeach


                </div>


            </div>

        @endif


        @if ((isset($managesection) && $managesection['galleries']) || empty($managesection))

            @if (checkFeature('gallery') && $vcard->gallery->count())

                <div class="gal">
                    <h4>Galleries</h4>
                    @foreach ($vcard->gallery as $file)
                        @php
                            $infoPath = pathinfo(public_path($file->gallery_image));
                            $extension = $infoPath['extension'];
                        @endphp

                        @if ($file->type == App\Models\Gallery::TYPE_IMAGE)
                            <div class="gal-con">
                                <img src="{{ $file->gallery_image }}" alt="">
                            </div>
                        @elseif($file->type == App\Models\Gallery::TYPE_FILE)
                            <div class="gal-con">
                                <a href="{{ $file->gallery_image }}">
                                    <div class="gallery-item"
                                        @if ($extension == 'pdf') style="background-image: url({{ asset('assets/images/pdf-icon.png') }})"> @endif
                                        @if ($extension == 'xls') style="background-image: url({{ asset('assets/images/xls.png') }})"> @endif
                                        @if ($extension == 'csv') style="background-image: url({{ asset('assets/images/csv-file.png') }})"> @endif
                                        @if ($extension == 'xlsx') style="background-image: url({{ asset('assets/images/xlsx.png') }})"> @endif
                                        </div>

                                </a>
                            </div>
                        @elseif($file->type == App\Models\Gallery::TYPE_VIDEO)
                            <div class="gal-con">
                                <video width="100%" height="" controls>
                                    <source src="{{ $file->gallery_image }}">
                                </video>
                            </div>
                        @elseif($file->type == App\Models\Gallery::TYPE_AUDIO)
                            <div class="gal-con">
                                <audio controls src="{{ $file->gallery_image }}" class="mt-2">
                                    Your browser does not support the <code>audio</code>
                                    element.
                                </audio>
                            </div>
                        @else
                            <iframe src="https://www.youtube.com/embed/{{ YoutubeID($file->link) }}" class="w-100"
                                height="224">
                            </iframe>
                        @endif
                    @endforeach


                    <div class="indicator">
                        <div></div>
                        <div></div>
                        <div class="active"></div>
                    </div>
                </div>
            @endif
        @endif

        @if ((isset($managesection) && $managesection['testimonials']) || empty($managesection))
            @if (checkFeature('testimonials') && $vcard->testimonials->count())
                <div class="test">
                    <h4>
                        Testimonial
                    </h4>

                    <div class="test-con">
                        @foreach ($vcard->testimonials as $testimonial)
                            <div class="test-item">
                                <img src="{{ $testimonial->image_url }}" alt="">

                                <div>
                                    <h1>{{ ucwords($testimonial->name) }}</h1>

                                    <p> {!! $testimonial->description !!}</p>
                                </div>
                            </div>
                        @endforeach
                        <svg width="29" height="29" viewBox="0 0 29 29" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21.75 21.75C22.2307 21.75 22.6917 21.559 23.0316 21.2191C23.3715 20.8792 23.5625 20.4182 23.5625 19.9375V15.5114C23.5625 15.0307 23.3715 14.5697 23.0316 14.2297C22.6917 13.8898 22.2307 13.6989 21.75 13.6989H19.2342C19.2342 13.0621 19.2717 12.4253 19.3466 11.7885C19.459 11.1143 19.6463 10.5149 19.9085 9.9905C20.1707 9.46608 20.5084 9.05344 20.9217 8.75256C21.3325 8.41544 21.8569 8.24688 22.4949 8.24688V5.4375C21.4461 5.4375 20.5277 5.66225 19.7399 6.11175C18.9575 6.55559 18.2853 7.17017 17.7733 7.90975C17.2579 8.72383 16.8783 9.61637 16.6496 10.5524C16.4183 11.585 16.3052 12.6407 16.3125 13.6989V19.9375C16.3125 20.4182 16.5034 20.8792 16.8433 21.2191C17.1832 21.559 17.6443 21.75 18.125 21.75H21.75ZM10.875 21.75C11.3557 21.75 11.8167 21.559 12.1566 21.2191C12.4965 20.8792 12.6875 20.4182 12.6875 19.9375V15.5114C12.6875 15.0307 12.4965 14.5697 12.1566 14.2297C11.8167 13.8898 11.3557 13.6989 10.875 13.6989H8.35921C8.35921 13.0621 8.39667 12.4253 8.47159 11.7885C8.58517 11.1143 8.77246 10.5149 9.03346 9.9905C9.29567 9.46608 9.6334 9.05344 10.0467 8.75256C10.4575 8.41544 10.9819 8.24688 11.6199 8.24688V5.4375C10.5711 5.4375 9.65273 5.66225 8.8649 6.11175C8.08252 6.55559 7.41032 7.17017 6.89834 7.90975C6.38288 8.72383 6.00334 9.61637 5.77459 10.5524C5.54328 11.585 5.43018 12.6407 5.43746 13.6989V19.9375C5.43746 20.4182 5.62842 20.8792 5.96833 21.2191C6.30824 21.559 6.76926 21.75 7.24996 21.75H10.875Z"
                                fill="#CFCFCF" />
                        </svg>

                    </div>

                    <div class="indicator">
                        <div></div>
                        <div></div>
                        <div class="active"></div>
                    </div>
                </div>
            @endif
        @endif

        @if ((isset($managesection) && $managesection['business_hours']) || empty($managesection))
            @if ($vcard->businessHours->count())
                @php
                    $todayWeekName = strtolower(\Carbon\Carbon::now()->rawFormat('D'));
                @endphp
                <div class="buss">
                    <h4>Business Hours</h4>

                    <div class="buss-con">
                        @foreach ($businessDaysTime as $key => $dayTime)
                            <div class="buss-item">
                                <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="48" height="48" rx="10" fill="black"
                                        fill-opacity="0.1" />
                                    <path
                                        d="M20 26C19.7167 26 19.4793 25.904 19.288 25.712C19.0967 25.52 19.0007 25.2827 19 25C18.9993 24.7173 19.0953 24.48 19.288 24.288C19.4807 24.096 19.718 24 20 24C20.282 24 20.5197 24.096 20.713 24.288C20.9063 24.48 21.002 24.7173 21 25C20.998 25.2827 20.902 25.5203 20.712 25.713C20.522 25.9057 20.2847 26.0013 20 26ZM24 26C23.7167 26 23.4793 25.904 23.288 25.712C23.0967 25.52 23.0007 25.2827 23 25C22.9993 24.7173 23.0953 24.48 23.288 24.288C23.4807 24.096 23.718 24 24 24C24.282 24 24.5197 24.096 24.713 24.288C24.9063 24.48 25.002 24.7173 25 25C24.998 25.2827 24.902 25.5203 24.712 25.713C24.522 25.9057 24.2847 26.0013 24 26ZM28 26C27.7167 26 27.4793 25.904 27.288 25.712C27.0967 25.52 27.0007 25.2827 27 25C26.9993 24.7173 27.0953 24.48 27.288 24.288C27.4807 24.096 27.718 24 28 24C28.282 24 28.5197 24.096 28.713 24.288C28.9063 24.48 29.002 24.7173 29 25C28.998 25.2827 28.902 25.5203 28.712 25.713C28.522 25.9057 28.2847 26.0013 28 26ZM17 34C16.45 34 15.9793 33.8043 15.588 33.413C15.1967 33.0217 15.0007 32.5507 15 32V18C15 17.45 15.196 16.9793 15.588 16.588C15.98 16.1967 16.4507 16.0007 17 16H18V15C18 14.7167 18.096 14.4793 18.288 14.288C18.48 14.0967 18.7173 14.0007 19 14C19.2827 13.9993 19.5203 14.0953 19.713 14.288C19.9057 14.4807 20.0013 14.718 20 15V16H28V15C28 14.7167 28.096 14.4793 28.288 14.288C28.48 14.0967 28.7173 14.0007 29 14C29.2827 13.9993 29.5203 14.0953 29.713 14.288C29.9057 14.4807 30.0013 14.718 30 15V16H31C31.55 16 32.021 16.196 32.413 16.588C32.805 16.98 33.0007 17.4507 33 18V32C33 32.55 32.8043 33.021 32.413 33.413C32.0217 33.805 31.5507 34.0007 31 34H17ZM17 32H31V22H17V32Z"
                                        fill="#0075E2" />
                                </svg>

                                <div class="kv">


                                    <p> {{ __('messages.business.' . \App\Models\BusinessHour::DAY_OF_WEEK[$key]) }}
                                    </p>
                                    <h5>{{ $dayTime ?? __('messages.common.closed') }}</h5>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
                @endif
            @endif

            @if ((isset($managesection) && $managesection['blogs']) || empty($managesection))
            @if (checkFeature('blog') && $vcard->blogs->count())
                <div class="blog">
                    <h4>Blog</h4>

                    <div class="blog-con">
                        @foreach ($vcard->blogs as $blog)

                        <div class="blog-item">
                            <a href="{{ route('vcard.show-blog', [$vcard->url_alias, $blog->id]) }}">
                            <div class="blog-image">
                                <img src="{{ $blog->blog_icon }}" alt="">
                            </div>


                            <p>{{ $blog->title }}</p></a>
                          
                        </div>
                        @endforeach
                    </div>


                    <div class="indicator">
                        <div></div>
                        <div></div>
                        <div class="active"></div>
                    </div>
                </div>
                @endif
                @endif


                <div class="book">
                    <h4>Book Appointment</h4>

                    <div class="book-con">

                        <div class="book-box">
                            <p>Date</p>
                            {{ Form::text('date', null, ['class' => 'date appoint-input mb-2 form-control', 'placeholder' => __('messages.form.pick_date'), 'id' => 'pickUpDate']) }}

                            /* <input type="date"> */
                        </div>

                        <div class="book-box">
                            <p>Hour</p>
                            <div id="slotData" class="row">
                            </div>
                        </div>

                    

                        <button type="button" class="appointmentAdd">Book Appointment</button>
                        @include('vcardTemplates.appointment')
                    </div>
                </div>

                
            {{-- Contact us --}}
            @php
                $currentSubs = $vcard
                    ->subscriptions()
                    ->where('status', \App\Models\Subscription::ACTIVE)
                    ->latest()
                    ->first();
            @endphp
            @if ($currentSubs && $currentSubs->plan->planFeature->enquiry_form && $vcard->enable_enquiry_form)
                <div class="iqn">
                    <h4>Inquiries</h4>
                    <form id="enquiryForm">
                        @csrf
                    <div class="iqn-con">


                        <input type="text" placeholder="{{ __('messages.form.your_name') }}" name="name" >



                        <input type="text" placeholder="{{ __('messages.form.your_email') }}" name="email">

                        <input type="text" placeholder="{{ __('messages.form.phone') }}" name="phone">

                        <textarea name="" id="" rows="10" id="message" name="message" placeholder="{{ __('messages.form.type_message') }}"></textarea>

                        @if (!empty($vcard->privacy_policy) || !empty($vcard->term_condition))
                                <div class="form-check mb-3">
                                    <input type="checkbox" name="terms_condition"
                                        class="form-check-input terms-condition" id="termConditionCheckbox"
                                        placeholder>&nbsp;
                                    <label class="form-check-label" for="privacyPolicyCheckbox">
                                        <span class="text-dark">{{ __('messages.vcard.agree_to_our') }}</span>
                                        <a href="{{ route('vcard.show-privacy-policy', [$vcard->url_alias, $vcard->id]) }}"
                                            target="_blank"
                                            class="text-decoration-none link-info fs-6">{!! __('messages.vcard.term_and_condition') !!}</a>
                                        <span class="text-dark">&</span>
                                        <a href="{{ route('vcard.show-privacy-policy', [$vcard->url_alias, $vcard->id]) }}"
                                            target="_blank"
                                            class="text-decoration-none link-info fs-6">{{ __('messages.vcard.privacy_policy') }}</a>
                                    </label>
                                </div>
                            @endif
                        <button type="submit">{{ __('messages.contact_us.send_message') }}</button>
                    </div>
                    </form>
                </div>
                @endif

                <div class="card">
                    <h4>Create Your Card</h4>

                    <div class="card-box">
                        <input type="text" value="https://wavio.ng/register?referralcode=LCR7LLBMMK">

                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3.33752 7.16252C3.51442 6.99183 3.75128 6.89745 3.99709 6.8997C4.2429 6.90195 4.47799 7.00065 4.65173 7.17456C4.82546 7.34846 4.92395 7.58364 4.92597 7.82946C4.92799 8.07527 4.83338 8.31204 4.66252 8.48877L3.75377 9.39752C3.12121 10.0427 2.76885 10.9114 2.7733 11.8149C2.77774 12.7184 3.13863 13.5837 3.77751 14.2225C4.41639 14.8614 5.28163 15.2223 6.18513 15.2267C7.08864 15.2312 7.95738 14.8788 8.60252 14.2463L9.51127 13.3375C9.68899 13.1719 9.92405 13.0818 10.1669 13.0861C10.4098 13.0903 10.6415 13.1887 10.8133 13.3605C10.9851 13.5323 11.0835 13.764 11.0877 14.0069C11.092 14.2497 11.0019 14.4848 10.8363 14.6625L9.92877 15.5713C8.92983 16.5445 7.58772 17.0852 6.19307 17.0761C4.79841 17.067 3.46345 16.509 2.47726 15.5228C1.49107 14.5366 0.933016 13.2016 0.923941 11.807C0.914865 10.4123 1.4555 9.07022 2.42877 8.07127L3.33752 7.16252ZM13.3375 9.51127C13.1719 9.68899 13.0818 9.92405 13.0861 10.1669C13.0903 10.4098 13.1887 10.6415 13.3605 10.8133C13.5323 10.9851 13.764 11.0835 14.0069 11.0877C14.2497 11.092 14.4848 11.0019 14.6625 10.8363L15.5713 9.92877C16.5445 8.92983 17.0852 7.58772 17.0761 6.19307C17.067 4.79841 16.509 3.46345 15.5228 2.47726C14.5366 1.49107 13.2016 0.933016 11.807 0.923941C10.4123 0.914865 9.07022 1.4555 8.07127 2.42877L7.16252 3.33752C6.99183 3.51442 6.89745 3.75128 6.8997 3.99709C6.90195 4.2429 7.00065 4.47799 7.17456 4.65173C7.34846 4.82546 7.58364 4.92395 7.82946 4.92597C8.07527 4.92799 8.31204 4.83338 8.48877 4.66252L9.39752 3.75377C10.0427 3.12121 10.9114 2.76885 11.8149 2.7733C12.7184 2.77774 13.5837 3.13863 14.2225 3.77751C14.8614 4.41639 15.2223 5.28163 15.2267 6.18513C15.2312 7.08864 14.8788 7.95738 14.2463 8.60252L13.3375 9.51127ZM12.1625 7.16252C12.2546 7.07669 12.3285 6.97319 12.3797 6.85819C12.431 6.7432 12.4585 6.61905 12.4608 6.49318C12.463 6.3673 12.4398 6.24226 12.3927 6.12552C12.3455 6.00879 12.2753 5.90275 12.1863 5.81372C12.0973 5.7247 11.9913 5.65452 11.8745 5.60737C11.7578 5.56022 11.6327 5.53706 11.5069 5.53928C11.381 5.5415 11.2568 5.56906 11.1418 5.6203C11.0269 5.67154 10.9234 5.74541 10.8375 5.83752L5.83752 10.8375C5.74541 10.9234 5.67154 11.0269 5.6203 11.1418C5.56906 11.2568 5.5415 11.381 5.53928 11.5069C5.53706 11.6327 5.56022 11.7578 5.60737 11.8745C5.65452 11.9913 5.7247 12.0973 5.81372 12.1863C5.90275 12.2753 6.00879 12.3455 6.12552 12.3927C6.24226 12.4398 6.3673 12.463 6.49318 12.4608C6.61905 12.4585 6.7432 12.431 6.85819 12.3797C6.97319 12.3285 7.07669 12.2546 7.16252 12.1625L12.1625 7.16252Z"
                                fill="#505050" />
                        </svg>

                    </div>
                </div>


                <!-- Modal -->
                @if ((isset($managesection) && $managesection['news_latter_popup']) || empty($managesection))
                    <div class="modal fade" id="newsLatterModal" tabindex="-1"
                        aria-labelledby="newsLatterModalLabel" aria-hidden="true">
                        <div class="modal-dialog news-modal">
                            <div class="modal-content animate-bottom" id="newsLatter-content">
                                <div class="newsmodal-header">
                                    <button type="button" class="btn-close p-5 position-absolute top-0 end-0"
                                        data-bs-dismiss="modal" aria-label="Close"
                                        id="closeNewsLatterModal"></button>
                                    <h1 class="newsmodal-title text-center mt-5" id="newsLatterModalLabel"><i
                                            class="fa-solid fa-envelope-open-text"></i></h1>

                                </div>
                                <div class="modal-body">
                                    <h1 class="content text-center  p-2">
                                        {{ __('messages.vcard.subscribe_newslatter') }}</h1>
                                    <h3 class="modal-desc text-center">{{ __('messages.vcard.update_directly') }}
                                    </h3>
                                    <form action="" method="post" id="newsLatterForm">
                                        @csrf
                                        <input type="hidden" name="vcard_id" value="{{ $vcard->id }}">
                                        <div class="input-group mb-3 mt-5">
                                            <input type="email" class="form-control bg-dark border-dark text-light"
                                                placeholder="{{ __('messages.form.enter_your_email') }}"
                                                name="email" id="emailSubscription" aria-label="Email"
                                                aria-describedby="button-addon2">
                                            <button class="btn" type="submit" id="email-send"><i
                                                    class="fa-regular fa-envelope"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                {{-- share modal code --}}
                <div id="vcard1-shareModel" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="">
                                <div class="row align-items-center mt-3">
                                    <div class="col-10 text-center">
                                        <h5 class="modal-title" style="padding-left: 50px;">
                                            {{ __('messages.vcard.share_my_vcard') }}</h5>
                                    </div>
                                    <div class="col-2 p-0">
                                        <button type="button" aria-label="Close"
                                            class="p-3 btn btn-sm btn-icon btn-active-color-danger border-none"
                                            data-bs-dismiss="modal">
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                                        fill="#000000">
                                                        <rect fill="#000000" x="0" y="7" width="16"
                                                            height="2" rx="1" />
                                                        <rect fill="#000000" opacity="0.5"
                                                            transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                                            x="0" y="7" width="16" height="2"
                                                            rx="1" />
                                                    </g>
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @php
                                $shareUrl = route('vcard.show', ['alias' => $vcard->url_alias]);
                            @endphp
                            <div class="modal-body">
                                <a href="http://www.facebook.com/sharer.php?u={{ $shareUrl }}" target="_blank"
                                    class="text-decoration-none share" title="Facebook">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fab fa-facebook fa-2x" style="color: #1B95E0"></i>

                                        </div>
                                        <div class="col-9 p-1">
                                            <p class="align-items-center text-dark">
                                                {{ __('messages.social.Share_on_facebook') }}</p>
                                        </div>
                                        <div class="col-1 p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.0" height="16px"
                                                viewBox="0 0 512.000000 512.000000"
                                                preserveAspectRatio="xMidYMid meet">
                                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                    fill="#000000" stroke="none">
                                                    <path
                                                        d="M1277 4943 l-177 -178 1102 -1102 1103 -1103 -1103 -1103 -1102 -1102 178 -178 177 -177 1280 1280 1280 1280 -1280 1280 -1280 1280 -178 -177z" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                                <a href="http://twitter.com/share?url={{ $shareUrl }}&text={{ $vcard->name }}&hashtags=sharebuttons"
                                    target="_blank" class="text-decoration-none share" title="Twitter">
                                    <div class="row">
                                        <div class="col-2">

                                            <span><svg xmlns="http://www.w3.org/2000/svg" height="2em"
                                                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                    <path
                                                        d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                                </svg></span>

                                        </div>
                                        <div class="col-9 p-1">
                                            <p class="align-items-center text-dark">
                                                {{ __('messages.social.Share_on_twitter') }}</p>
                                        </div>
                                        <div class="col-1 p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.0" height="16px"
                                                viewBox="0 0 512.000000 512.000000"
                                                preserveAspectRatio="xMidYMid meet">
                                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                    fill="#000000" stroke="none">
                                                    <path
                                                        d="M1277 4943 l-177 -178 1102 -1102 1103 -1103 -1103 -1103 -1102 -1102 178 -178 177 -177 1280 1280 1280 1280 -1280 1280 -1280 1280 -178 -177z" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                                <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ $shareUrl }}"
                                    target="_blank" class="text-decoration-none share" title="Linkedin">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fab fa-linkedin fa-2x" style="color: #1B95E0"></i>
                                        </div>
                                        <div class="col-9 p-1">
                                            <p class="align-items-center text-dark">
                                                {{ __('messages.social.Share_on_linkedin') }}</p>
                                        </div>
                                        <div class="col-1 p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.0" height="16px"
                                                viewBox="0 0 512.000000 512.000000"
                                                preserveAspectRatio="xMidYMid meet">
                                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                    fill="#000000" stroke="none">
                                                    <path
                                                        d="M1277 4943 l-177 -178 1102 -1102 1103 -1103 -1103 -1103 -1102 -1102 178 -178 177 -177 1280 1280 1280 1280 -1280 1280 -1280 1280 -178 -177z" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                                <a href="mailto:?Subject=&Body={{ $shareUrl }}" target="_blank"
                                    class="text-decoration-none share" title="Email">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fas fa-envelope fa-2x" style="color: #191a19  "></i>
                                        </div>
                                        <div class="col-9 p-1">
                                            <p class="align-items-center text-dark">
                                                {{ __('messages.social.Share_on_email') }}</p>
                                        </div>
                                        <div class="col-1 p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.0" height="16px"
                                                viewBox="0 0 512.000000 512.000000"
                                                preserveAspectRatio="xMidYMid meet">
                                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                    fill="#000000" stroke="none">
                                                    <path
                                                        d="M1277 4943 l-177 -178 1102 -1102 1103 -1103 -1103 -1103 -1102 -1102 178 -178 177 -177 1280 1280 1280 1280 -1280 1280 -1280 1280 -178 -177z" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                                <a href="http://pinterest.com/pin/create/link/?url={{ $shareUrl }}"
                                    target="_blank" class="text-decoration-none share" title="Pinterest">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fab fa-pinterest fa-2x" style="color: #bd081c"></i>
                                        </div>
                                        <div class="col-9 p-1">
                                            <p class="align-items-center text-dark">
                                                {{ __('messages.social.Share_on_pinterest') }}</p>
                                        </div>
                                        <div class="col-1 p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.0" height="16px"
                                                viewBox="0 0 512.000000 512.000000"
                                                preserveAspectRatio="xMidYMid meet">
                                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                    fill="#000000" stroke="none">
                                                    <path
                                                        d="M1277 4943 l-177 -178 1102 -1102 1103 -1103 -1103 -1103 -1102 -1102 178 -178 177 -177 1280 1280 1280 1280 -1280 1280 -1280 1280 -178 -177z" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                                <a href="http://reddit.com/submit?url={{ $shareUrl }}&title={{ $vcard->name }}"
                                    target="_blank" class="text-decoration-none share" title="Reddit">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fab fa-reddit fa-2x" style="color: #ff4500"></i>
                                        </div>
                                        <div class="col-9 p-1">
                                            <p class="align-items-center text-dark">
                                                {{ __('messages.social.Share_on_reddit') }}</p>
                                        </div>
                                        <div class="col-1 p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.0" height="16px"
                                                viewBox="0 0 512.000000 512.000000"
                                                preserveAspectRatio="xMidYMid meet">
                                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                    fill="#000000" stroke="none">
                                                    <path
                                                        d="M1277 4943 l-177 -178 1102 -1102 1103 -1103 -1103 -1103 -1102 -1102 178 -178 177 -177 1280 1280 1280 1280 -1280 1280 -1280 1280 -178 -177z" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                                <a href="https://wa.me/?text={{ $shareUrl }}" target="_blank"
                                    class="text-decoration-none share" title="Whatsapp">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fab fa-whatsapp fa-2x" style="color: limegreen"></i>
                                        </div>
                                        <div class="col-9 p-1">
                                            <p class="align-items-center text-dark">
                                                {{ __('messages.social.Share_on_whatsapp') }}</p>
                                        </div>
                                        <div class="col-1 p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.0" height="16px"
                                                viewBox="0 0 512.000000 512.000000"
                                                preserveAspectRatio="xMidYMid meet">
                                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                    fill="#000000" stroke="none">
                                                    <path
                                                        d="M1277 4943 l-177 -178 1102 -1102 1103 -1103 -1103 -1103 -1102 -1102 178 -178 177 -177 1280 1280 1280 1280 -1280 1280 -1280 1280 -178 -177z" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                                <div class="col-12 justify-content-between social-link-modal">
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                            placeholder="{{ request()->fullUrl() }}" disabled>
                                        <span id="vcardUrlCopy{{ $vcard->id }}" class="d-none" target="_blank">
                                            {{ route('vcard.show', ['alias' => $vcard->url_alias]) }} </span>
                                        <button class="copy-vcard-clipboard btn btn-dark" title="Copy Link"
                                            data-id="{{ $vcard->id }}">
                                            <i class="fa-regular fa-copy fa-2x"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="text-center">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                @include('vcardTemplates.template.templates')
            </div>
            {{-- support banner --}}
            @if ((isset($managesection) && $managesection['banner']) || empty($managesection))
                @if (isset($banners->title))
                    <div class="mb-10 mt-0">
                        <div class="support-banner d-flex align-items-center justify-content-center">
                            <button type="button" class="text-start banner-close"><i
                                    class="fa-solid fa-xmark"></i></button>
                            <div class="">
                                <h1 class="text-center support_heading">{{ $banners->title }}</h1>
                                <p class="text-center support_text text-dark">{{ $banners->description }} </p>
                                <div class="text-center">
                                    <a href="{{ $banners->url }}" class="act-now rounded text-light" target="blank"
                                        data-turbo="false">{{ $banners->banner_button }} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="{{ asset('assets/js/front-third-party.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/slider/js/slick.min.js') }}" type="text/javascript"></script>
    @if (checkFeature('seo') && $vcard->google_analytics)
        {!! $vcard->google_analytics !!}
    @endif
    @if (isset(checkFeature('advanced')->custom_js) && $vcard->custom_js)
        {!! $vcard->custom_js !!}
    @endif
    @php
        $setting = \App\Models\UserSetting::where('user_id', $vcard->tenant->user->id)
            ->where('key', 'stripe_key')
            ->first();
    @endphp
    <script>
        let stripe = ''
        @if (!empty($setting) && !empty($setting->value))
            stripe = Stripe('{{ $setting->value }}');
        @endif
        $('.testimonial-slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 2,
            autoplay: false,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<button class="slide-arrow-testimonial prev-arrow"></button>',
            nextArrow: '<button class="slide-arrow-testimonial  next-arrow"></button>',
            adaptiveHeight: true,
            responsive: [{
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true,
                },
            }, ],
        });
    </script>
    <script>
        $('.product-slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 2,
            autoplay: true,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<button class="product-slide-arrow prev-arrow"></button>',
            nextArrow: '<button class="product-slide-arrow next-arrow"></button>',
            responsive: [{
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true,
                },
            }, ],
        });
    </script>
    <script>
        $('.gallery-slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 2,
            autoplay: true,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<button class="slide-arrow prev-arrow"></button>',
            nextArrow: '<button class="slide-arrow next-arrow"></button>',
            responsive: [{
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true,
                },
            }, ],
        });

        $('.blog-slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            autoplay: true,
            slidesToScroll: 1,
            arrows: false,
            prevArrow: '<button class="slide-arrow prev-arrow"></button>',
            nextArrow: '<button class="slide-arrow next-arrow"></button>',
        });
        $('.iframe-slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            autoplay: false,
            slidesToScroll: 1,
            arrows: false,
            prevArrow: '<button class="slide-arrow-iframe iframe-prev-arrow"></button>',
            nextArrow: '<button class="slide-arrow-iframe iframe-next-arrow"></button>',
        });
    </script>
    <script>
        let isEdit = false;
        let password = "{{ isset(checkFeature('advanced')->password) && !empty($vcard->password) }}";
        let passwordUrl = "{{ route('vcard.password', $vcard->id) }}";
        let enquiryUrl = "{{ route('enquiry.store', ['vcard' => $vcard->id, 'alias' => $vcard->url_alias]) }}";
        let appointmentUrl = "{{ route('appointment.store', ['vcard' => $vcard->id, 'alias' => $vcard->url_alias]) }}";
        let paypalUrl = "{{ route('paypal.init') }}";
        let slotUrl = "{{ route('appointment-session-time', $vcard->url_alias) }}";
        let appUrl = "{{ config('app.url') }}";
        let vcardId = {{ $vcard->id }};
        let vcardAlias = "{{ $vcard->url_alias }}";
        let languageChange = "{{ url('language') }}";
        let lang = "{{ checkLanguageSession($vcard->url_alias) }}";
    </script>
    <script>
        const qrCodeOne = document.getElementById("qr-code-one");
        const svg = qrCodeOne.querySelector("svg");

        const blob = new Blob([svg.outerHTML], {
            type: 'image/svg+xml'
        });
        const url = URL.createObjectURL(blob);
        const image = document.createElement('img');
        image.src = url;
        image.addEventListener('load', () => {
            const canvas = document.createElement('canvas');
            canvas.width = canvas.height = {{ $vcard->qr_code_download_size }};
            const context = canvas.getContext('2d');
            context.drawImage(image, 0, 0, canvas.width, canvas.height);
            const link = document.getElementById('qr-code-btn');
            link.href = canvas.toDataURL();
            URL.revokeObjectURL(url);
        });
    </script>
    @routes
    <script src="{{ asset('messages.js') }}"></script>
    <script src="{{ mix('assets/js/custom/helpers.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom.js') }}"></script>
    <script src="{{ mix('assets/js/vcards/vcard-view.js') }}"></script>
    <script src="{{ mix('assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('/sw.js') }}"></script>
<script>
    if ("serviceWorker" in navigator) {
        // Register a service worker hosted at the root of the
        // site using the default scope.
        navigator.serviceWorker.register("/sw.js").then(
        (registration) => {
            console.log("Service worker registration succeeded:", registration);
        },
        (error) => {
            console.error(`Service worker registration failed: ${error}`);
        },
    );
    } else {
        console.error("Service workers are not supported.");
    }
</script>
</body>

</html>
