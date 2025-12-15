@extends('layouts.app')

@section('title', 'About Us | Safe World Telecom Ltd')

@section('content')
<div class="bg-gradient-to-b from-gray-50 to-white">
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 text-white py-20">
        <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.05\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-6">About Safe World Telecom Limited</h1>
            <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto leading-relaxed">
                A trusted Kenyan telecommunications company and authorized Safaricom Dealer and M-Pesa Agent, delivering reliable communication solutions across Kenya.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <div class="bg-white/20 backdrop-blur-sm px-6 py-3 rounded-full">
                    <span class="font-semibold">Est. 2007</span>
                </div>
                <div class="bg-white/20 backdrop-blur-sm px-6 py-3 rounded-full">
                    <span class="font-semibold">19 Retail Outlets</span>
                </div>
                <div class="bg-white/20 backdrop-blur-sm px-6 py-3 rounded-full">
                    <span class="font-semibold">38+ Locations</span>
                </div>
            </div>
        </div>
    </section>

    <div class="container mx-auto px-6 pb-16">
        <!-- Who We Are -->
        <section class="mb-20 -mt-8 relative z-20">
            <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12 border border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="w-1 h-12 bg-gradient-to-b from-blue-600 to-indigo-600 rounded-full mr-4"></div>
                    <h2 class="text-3xl font-bold text-gray-900">Who We Are</h2>
                </div>
                <p class="text-lg text-gray-700 leading-relaxed">
                    SAFE WORLD TELECOM LIMITED is a Kenyan-based telecommunications company registered in 2007. We are a duly authorized Safaricom Dealer and M-Pesa Agent, primarily dealing in the distribution of mobile phones, telecommunication accessories, and services. Over the years, we have grown our footprint countrywide with permanent retail outlets as well as mobile outlets comprising Vans and RIGs.
                </p>
            </div>
        </section>

        <!-- Vision & Mission -->
        <section class="grid md:grid-cols-2 gap-8 mb-20">
            <div class="group relative overflow-hidden bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-blue-100">
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-200 rounded-full -mr-16 -mt-16 opacity-20 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center mb-5 shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Our Vision</h2>
                    <p class="text-gray-700 text-lg italic leading-relaxed">
                        "To be the leading and most referred communication solution provider in Kenya and the East African region."
                    </p>
                </div>
            </div>

            <div class="group relative overflow-hidden bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-indigo-100">
                <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-200 rounded-full -mr-16 -mt-16 opacity-20 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-xl flex items-center justify-center mb-5 shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Our Mission</h2>
                    <p class="text-gray-700 text-lg italic leading-relaxed">
                        "To be the best and most successful distributor of telecommunication products and services, offering communication solutions that meet our customers' needs."
                    </p>
                </div>
            </div>
        </section>

        <!-- Core Values -->
        <section class="mb-20">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Core Values</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto rounded-full"></div>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-6">
                <div class="group bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 text-center border border-gray-100 hover:border-blue-200 hover:-translate-y-1">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-200 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Integrity</h3>
                </div>

                <div class="group bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 text-center border border-gray-100 hover:border-indigo-200 hover:-translate-y-1">
                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-100 to-indigo-200 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">High Quality Service</h3>
                </div>

                <div class="group bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 text-center border border-gray-100 hover:border-purple-200 hover:-translate-y-1">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-100 to-purple-200 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Creativity</h3>
                </div>

                <div class="group bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 text-center border border-gray-100 hover:border-pink-200 hover:-translate-y-1">
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-100 to-pink-200 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Competence</h3>
                </div>

                <div class="group bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 text-center border border-gray-100 hover:border-green-200 hover:-translate-y-1">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-100 to-green-200 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Team Spirit</h3>
                </div>
            </div>
        </section>

        <!-- Objectives -->
        <section class="mb-20">
            <div class="bg-gradient-to-br from-gray-50 to-blue-50 rounded-3xl p-8 md:p-12 border border-gray-200">
                <div class="flex items-center mb-8">
                    <div class="w-1 h-12 bg-gradient-to-b from-blue-600 to-indigo-600 rounded-full mr-4"></div>
                    <h2 class="text-3xl font-bold text-gray-900">Our Objectives</h2>
                </div>
                <div class="space-y-6">
                    <div class="flex gap-4 items-start group">
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 text-white rounded-xl flex items-center justify-center font-bold shadow-lg group-hover:scale-110 transition-transform duration-300">1</div>
                        <p class="text-gray-700 text-lg leading-relaxed pt-1">
                            To make wireless communication affordable and accessible to all through growth in product distribution and extensive service coverage.
                        </p>
                    </div>
                    <div class="flex gap-4 items-start group">
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 text-white rounded-xl flex items-center justify-center font-bold shadow-lg group-hover:scale-110 transition-transform duration-300">2</div>
                        <p class="text-gray-700 text-lg leading-relaxed pt-1">
                            To offer a one-stop-shop experience in all our outlets while maintaining high-quality customer service through continuous staff training and motivation.
                        </p>
                    </div>
                    <div class="flex gap-4 items-start group">
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 text-white rounded-xl flex items-center justify-center font-bold shadow-lg group-hover:scale-110 transition-transform duration-300">3</div>
                        <p class="text-gray-700 text-lg leading-relaxed pt-1">
                            To become a relevant and strategic partner by providing deep distribution infrastructure through strategically located outlets in major towns and rural areas.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Products & Services and Branch Network -->
        <section class="grid lg:grid-cols-2 gap-8 mb-20">
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Our Products & Services</h2>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    We deal in a wide range of telecommunication products and services including mobile phones and accessories, Safaricom voice and data top-ups (physical, pinless, and virtual), tablets, routers, laptops, SIM card connections and replacements, fibre internet solutions for home and office, M-Pesa agency services, Lipa Na M-Pesa and Paybill tills, bulk payment solutions, Safaricom customer care services, voice and data plans, and Internet of Things (IoT) solutions.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-100 to-indigo-200 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Branch Network</h2>
                </div>
                <p class="text-gray-700 leading-relaxed mb-6">
                    Safe World Telecom Limited has an extensive distribution network comprising 19 retail outlets, 16 Vans, and 3 RIGs. Our operations span across Nairobi, Rift Valley, Western, Nyanza, Central, and Eastern regions of Kenya.
                </p>
                <div class="grid grid-cols-3 gap-4">
                    <div class="text-center p-4 bg-blue-50 rounded-xl">
                        <div class="text-3xl font-bold text-blue-600">19</div>
                        <div class="text-sm text-gray-600 mt-1">Retail Outlets</div>
                    </div>
                    <div class="text-center p-4 bg-indigo-50 rounded-xl">
                        <div class="text-3xl font-bold text-indigo-600">16</div>
                        <div class="text-sm text-gray-600 mt-1">Mobile Vans</div>
                    </div>
                    <div class="text-center p-4 bg-purple-50 rounded-xl">
                        <div class="text-3xl font-bold text-purple-600">3</div>
                        <div class="text-sm text-gray-600 mt-1">RIGs</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Partnerships -->
        <section class="mb-20">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-3xl p-8 md:p-12 text-white shadow-xl">
                <h2 class="text-3xl font-bold mb-6">Our Partnerships</h2>
                <p class="text-blue-50 text-lg leading-relaxed mb-8">
                    In addition to Safaricom Limited as our major partner, we collaborate with leading global brands such as Tecno, Samsung, Huawei, Infinix, Midcom, and Mitsumi Distributors. These partnerships strengthen our ability to deliver comprehensive communication and internet networking solutions.
                </p>
                <div class="flex flex-wrap gap-3">
                    <span class="px-5 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold hover:bg-white/30 transition-colors duration-300">Safaricom</span>
                    <span class="px-5 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold hover:bg-white/30 transition-colors duration-300">Tecno</span>
                    <span class="px-5 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold hover:bg-white/30 transition-colors duration-300">Samsung</span>
                    <span class="px-5 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold hover:bg-white/30 transition-colors duration-300">Huawei</span>
                    <span class="px-5 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold hover:bg-white/30 transition-colors duration-300">Infinix</span>
                    <span class="px-5 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold hover:bg-white/30 transition-colors duration-300">Midcom</span>
                    <span class="px-5 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold hover:bg-white/30 transition-colors duration-300">Mitsumi</span>
                </div>
            </div>
        </section>

        <!-- Corporate Clientele -->
        <section class="mb-20">
            <div class="bg-white rounded-2xl p-8 md:p-12 shadow-lg border border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-100 to-green-200 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Corporate Clientele</h2>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    Our clientele includes major organizations such as the Teachers' Service Commission (TSC), NACADA, NEMA, County Governments, private organizations, tea estates and factories, hotels, lodges, training camps, NGOs, parastatals, and small to medium enterprises.
                </p>
            </div>
        </section>

        <!-- Leadership -->
        <section class="mb-20">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Leadership</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto rounded-full"></div>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 shadow-lg border border-blue-100 hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mb-6 shadow-lg">JK</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Mr. Justus Kimosop</h3>
                    <p class="text-sm text-blue-600 font-semibold mb-4">Executive Director</p>
                    <p class="text-gray-700 leading-relaxed">
                        Mr. Kimosop has been involved in the communications industry since 1999, mainly in the GSM sector. He has played a key role in shaping the company's strategic direction, expansion, and brand growth, positioning Safe World Telecom among the top-performing Safaricom dealers for over nine consecutive years.
                    </p>
                </div>

                <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-8 shadow-lg border border-indigo-100 hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mb-6 shadow-lg">CK</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Mrs. Caroline Kiprop</h3>
                    <p class="text-sm text-indigo-600 font-semibold mb-4">Director & General Manager</p>
                    <p class="text-gray-700 leading-relaxed">
                        Mrs. Kiprop has worked in the telecommunications industry since 2002 and has been instrumental in building strong client relationships, operational efficiency, and workforce development. Her background in Communications, Public Relations, and Human Resource management brings valuable leadership and governance experience.
                    </p>
                </div>
            </div>
        </section>

        <!-- Company Details -->
        <section class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-3xl p-8 md:p-12 shadow-2xl text-white">
            <div class="flex items-center mb-8">
                <div class="w-1 h-12 bg-gradient-to-b from-blue-400 to-indigo-400 rounded-full mr-4"></div>
                <h2 class="text-3xl font-bold">Company Details</h2>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <div>
                            <p class="text-gray-400 text-sm">Company Name</p>
                            <p class="text-white font-semibold">Safe World Telecom Limited</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <div>
                            <p class="text-gray-400 text-sm">Registration No</p>
                            <p class="text-white font-semibold">C.142120</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <div>
                            <p class="text-gray-400 text-sm">Head Office</p>
                            <p class="text-white font-semibold">Phoenix House, 2nd Floor, Kenyatta Avenue, Nairobi</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <div>
                            <p class="text-gray-400 text-sm">Postal Address</p>
                            <p class="text-white font-semibold">P.O. Box 9062 - 00100, Nairobi, Kenya</p>
                        </div>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <div>
                            <p class="text-gray-400 text-sm">Telephone</p>
                            <div class="space-y-1">
                                <p class="text-white font-semibold">+254 727 300 722</p>
                                <p class="text-white font-semibold">+254 722 752 333</p>
                                <p class="text-white font-semibold">+254 722 715 503</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                        <div>
                            <p class="text-gray-400 text-sm">Email</p>
                            <p class="text-white font-semibold">safeworldtel@gmail.com</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                        </svg>
                        <div>
                            <p class="text-gray-400 text-sm">Website</p>
                            <p class="text-white font-semibold">www.safeworldtelecom.co.ke</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>
@endsection

@section('title', 'About Us | Safe World Telecom Ltd')

@section('content')
<div class="bg-gradient-to-b from-gray-50 to-white">
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 text-white py-20">
        <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.05\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-6">About Safe World Telecom Limited</h1>
            <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto leading-relaxed">
                A trusted Kenyan telecommunications company and authorized Safaricom Dealer and M-Pesa Agent, delivering reliable communication solutions across Kenya.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <div class="bg-white/20 backdrop-blur-sm px-6 py-3 rounded-full">
                    <span class="font-semibold">Est. 2007</span>
                </div>
                <div class="bg-white/20 backdrop-blur-sm px-6 py-3 rounded-full">
                    <span class="font-semibold">19 Retail Outlets</span>
                </div>
                <div class="bg-white/20 backdrop-blur-sm px-6 py-3 rounded-full">
                    <span class="font-semibold">38+ Locations</span>
                </div>
            </div>
        </div>
    </section>

    <div class="container mx-auto px-6 pb-16">
        <!-- Who We Are -->
        <section class="mb-20 -mt-8 relative z-20">
            <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12 border border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="w-1 h-12 bg-gradient-to-b from-blue-600 to-indigo-600 rounded-full mr-4"></div>
                    <h2 class="text-3xl font-bold text-gray-900">Who We Are</h2>
                </div>
                <p class="text-lg text-gray-700 leading-relaxed">
                    SAFE WORLD TELECOM LIMITED is a Kenyan-based telecommunications company registered in 2007. We are a duly authorized Safaricom Dealer and M-Pesa Agent, primarily dealing in the distribution of mobile phones, telecommunication accessories, and services. Over the years, we have grown our footprint countrywide with permanent retail outlets as well as mobile outlets comprising Vans and RIGs.
                </p>
            </div>
        </section>

        <!-- Vision & Mission -->
        <section class="grid md:grid-cols-2 gap-8 mb-20">
            <div class="group relative overflow-hidden bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-blue-100">
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-200 rounded-full -mr-16 -mt-16 opacity-20 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center mb-5 shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Our Vision</h2>
                    <p class="text-gray-700 text-lg italic leading-relaxed">
                        "To be the leading and most referred communication solution provider in Kenya and the East African region."
                    </p>
                </div>
            </div>

            <div class="group relative overflow-hidden bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-indigo-100">
                <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-200 rounded-full -mr-16 -mt-16 opacity-20 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-xl flex items-center justify-center mb-5 shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Our Mission</h2>
                    <p class="text-gray-700 text-lg italic leading-relaxed">
                        "To be the best and most successful distributor of telecommunication products and services, offering communication solutions that meet our customers' needs."
                    </p>
                </div>
            </div>
        </section>

        <!-- Core Values -->
        <section class="mb-20">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Core Values</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto rounded-full"></div>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-6">
                <div class="group bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 text-center border border-gray-100 hover:border-blue-200 hover:-translate-y-1">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-200 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Integrity</h3>
                </div>

                <div class="group bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 text-center border border-gray-100 hover:border-indigo-200 hover:-translate-y-1">
                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-100 to-indigo-200 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">High Quality Service</h3>
                </div>

                <div class="group bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 text-center border border-gray-100 hover:border-purple-200 hover:-translate-y-1">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-100 to-purple-200 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Creativity</h3>
                </div>

                <div class="group bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 text-center border border-gray-100 hover:border-pink-200 hover:-translate-y-1">
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-100 to-pink-200 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Competence</h3>
                </div>

                <div class="group bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 text-center border border-gray-100 hover:border-green-200 hover:-translate-y-1">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-100 to-green-200 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Team Spirit</h3>
                </div>
            </div>
        </section>

        <!-- Objectives -->
        <section class="mb-20">
            <div class="bg-gradient-to-br from-gray-50 to-blue-50 rounded-3xl p-8 md:p-12 border border-gray-200">
                <div class="flex items-center mb-8">
                    <div class="w-1 h-12 bg-gradient-to-b from-blue-600 to-indigo-600 rounded-full mr-4"></div>
                    <h2 class="text-3xl font-bold text-gray-900">Our Objectives</h2>
                </div>
                <div class="space-y-6">
                    <div class="flex gap-4 items-start group">
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 text-white rounded-xl flex items-center justify-center font-bold shadow-lg group-hover:scale-110 transition-transform duration-300">1</div>
                        <p class="text-gray-700 text-lg leading-relaxed pt-1">
                            To make wireless communication affordable and accessible to all through growth in product distribution and extensive service coverage.
                        </p>
                    </div>
                    <div class="flex gap-4 items-start group">
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 text-white rounded-xl flex items-center justify-center font-bold shadow-lg group-hover:scale-110 transition-transform duration-300">2</div>
                        <p class="text-gray-700 text-lg leading-relaxed pt-1">
                            To offer a one-stop-shop experience in all our outlets while maintaining high-quality customer service through continuous staff training and motivation.
                        </p>
                    </div>
                    <div class="flex gap-4 items-start group">
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 text-white rounded-xl flex items-center justify-center font-bold shadow-lg group-hover:scale-110 transition-transform duration-300">3</div>
                        <p class="text-gray-700 text-lg leading-relaxed pt-1">
                            To become a relevant and strategic partner by providing deep distribution infrastructure through strategically located outlets in major towns and rural areas.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Products & Services and Branch Network -->
        <section class="grid lg:grid-cols-2 gap-8 mb-20">
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Our Products & Services</h2>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    We deal in a wide range of telecommunication products and services including mobile phones and accessories, Safaricom voice and data top-ups (physical, pinless, and virtual), tablets, routers, laptops, SIM card connections and replacements, fibre internet solutions for home and office, M-Pesa agency services, Lipa Na M-Pesa and Paybill tills, bulk payment solutions, Safaricom customer care services, voice and data plans, and Internet of Things (IoT) solutions.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-100 to-indigo-200 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Branch Network</h2>
                </div>
                <p class="text-gray-700 leading-relaxed mb-6">
                    Safe World Telecom Limited has an extensive distribution network comprising 19 retail outlets, 16 Vans, and 3 RIGs. Our operations span across Nairobi, Rift Valley, Western, Nyanza, Central, and Eastern regions of Kenya.
                </p>
                <div class="grid grid-cols-3 gap-4">
                    <div class="text-center p-4 bg-blue-50 rounded-xl">
                        <div class="text-3xl font-bold text-blue-600">19</div>
                        <div class="text-sm text-gray-600 mt-1">Retail Outlets</div>
                    </div>
                    <div class="text-center p-4 bg-indigo-50 rounded-xl">
                        <div class="text-3xl font-bold text-indigo-600">16</div>
                        <div class="text-sm text-gray-600 mt-1">Mobile Vans</div>
                    </div>
                    <div class="text-center p-4 bg-purple-50 rounded-xl">
                        <div class="text-3xl font-bold text-purple-600">3</div>
                        <div class="text-sm text-gray-600 mt-1">RIGs</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Partnerships -->
        <section class="mb-20">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-3xl p-8 md:p-12 text-white shadow-xl">
                <h2 class="text-3xl font-bold mb-6">Our Partnerships</h2>
                <p class="text-blue-50 text-lg leading-relaxed mb-8">
                    In addition to Safaricom Limited as our major partner, we collaborate with leading global brands such as Tecno, Samsung, Huawei, Infinix, Midcom, and Mitsumi Distributors. These partnerships strengthen our ability to deliver comprehensive communication and internet networking solutions.
                </p>
                <div class="flex flex-wrap gap-3">
                    <span class="px-5 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold hover:bg-white/30 transition-colors duration-300">Safaricom</span>
                    <span class="px-5 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold hover:bg-white/30 transition-colors duration-300">Tecno</span>
                    <span class="px-5 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold hover:bg-white/30 transition-colors duration-300">Samsung</span>
                    <span class="px-5 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold hover:bg-white/30 transition-colors duration-300">Huawei</span>
                    <span class="px-5 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold hover:bg-white/30 transition-colors duration-300">Infinix</span>
                    <span class="px-5 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold hover:bg-white/30 transition-colors duration-300">Midcom</span>
                    <span class="px-5 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold hover:bg-white/30 transition-colors duration-300">Mitsumi</span>
                </div>
            </div>
        </section>

        <!-- Corporate Clientele -->
        <section class="mb-20">
            <div class="bg-white rounded-2xl p-8 md:p-12 shadow-lg border border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-100 to-green-200 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Corporate Clientele</h2>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    Our clientele includes major organizations such as the Teachers' Service Commission (TSC), NACADA, NEMA, County Governments, private organizations, tea estates and factories, hotels, lodges, training camps, NGOs, parastatals, and small to medium enterprises.
                </p>
            </div>
        </section>

        <!-- Leadership -->
        <section class="mb-20">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Leadership</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto rounded-full"></div>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 shadow-lg border border-blue-100 hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mb-6 shadow-lg">JK</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Mr. Justus Kimosop</h3>
                    <p class="text-sm text-blue-600 font-semibold mb-4">Executive Director</p>
                    <p class="text-gray-700 leading-relaxed">
                        Mr. Kimosop has been involved in the communications industry since 1999, mainly in the GSM sector. He has played a key role in shaping the company's strategic direction, expansion, and brand growth, positioning Safe World Telecom among the top-performing Safaricom dealers for over nine consecutive years.
                    </p>
                </div>

                <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-8 shadow-lg border border-indigo-100 hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mb-6 shadow-lg">CK</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Mrs. Caroline Kiprop</h3>
                    <p class="text-sm text-indigo-600 font-semibold mb-4">Director & General Manager</p>
                    <p class="text-gray-700 leading-relaxed">
                        Mrs. Kiprop has worked in the telecommunications industry since 2002 and has been instrumental in building strong client relationships, operational efficiency, and workforce development. Her background in Communications, Public Relations, and Human Resource management brings valuable leadership and governance experience.
                    </p>
                </div>
            </div>
        </section>

        <!-- Company Details -->
        <section class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-3xl p-8 md:p-12 shadow-2xl text-white">
            <div class="flex items-center mb-8">
                <div class="w-1 h-12 bg-gradient-to-b from-blue-400 to-indigo-400 rounded-full mr-4"></div>
                <h2 class="text-3xl font-bold">Company Details</h2>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <div>
                            <p class="text-gray-400 text-sm">Company Name</p>
                            <p class="text-white font-semibold">Safe World Telecom Limited</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <div>
                            <p class="text-gray-400 text-sm">Registration No</p>
                            <p class="text-white font-semibold">C.142120</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <div>
                            <p class="text-gray-400 text-sm">Head Office</p>
                            <p class="text-white font-semibold">Phoenix House, 2nd Floor, Kenyatta Avenue, Nairobi</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <div>
                            <p class="text-gray-400 text-sm">Postal Address</p>
                            <p class="text-white font-semibold">P.O. Box 9062 - 00100, Nairobi, Kenya</p>
                        </div>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <div>
                            <p class="text-gray-400 text-sm">Telephone</p>
                            <div class="space-y-1">
                                <p class="text-white font-semibold">+254 727 300 722</p>
                                <p class="text-white font-semibold">+254 722 752 333</p>
                                <p class="text-white font-semibold">+254 722 715 503</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                        <div>
                            <p class="text-gray-400 text-sm">Email</p>
                            <p class="text-white font-semibold">safeworldtel@gmail.com</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                        </svg>
                        <div>
                            <p class="text-gray-400 text-sm">Website</p>
                            <p class="text-white font-semibold">www.safeworldtelecom.co.ke</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>
@endsection
