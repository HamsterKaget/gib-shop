<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- <meta charset="utf-8"> --}}
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Shop Gathering in Bali | Ticket')</title>
        <script src="https://cdn.tailwindcss.com"></script>
        {{-- @vite(['resources/css/app.css','resources/js/app.js']) --}}
    </head>


    <body>
        {{-- <section id="" class="element bg-white mx-auto px-4">
            <div class="container mx-auto my-auto flex flex-col items-center justify-center w-full overflow-auto">
                <div class="flex justify-between items-center w-full my-8">
                    <div>
                        <img src="https://shop.gatheringinbali.com/images/favicon.png" class="w-16 h-auto" alt="logo gib">
                    </div>
                    <div class="flex flex-col justify-end text-slate-500 text-xs text-right">
                        <h3>GatheringInBali</h3>
                        <h3>OrderID / Invoice #1699066573404-51-213</h3>
                        <h3>November 05 2023</h3>
                    </div>
                </div>

                <div class="flex flex-col w-full mx-auto justify-center overflow-auto ">
                    <p class="text-left text-slate-500">
                        <span class="text-black font-semibold">Hi, Radja Aulia Al Ramdani</span>
                        <br>
                        <br>
                        Thank you for purchasing our products at gatheringinbali,<br>
                        Below are your ticket details :
                    </p>

                        <table class="text-sm text-left text-gray-500  mt-4 break-words">
                            <tbody class="break-words">
                                <tr class="border border-gray-200">
                                    <th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 ">
                                        Product Name
                                    </th>
                                    <td class="px-2 py-4">
                                        Comsnets Bali 2023: Fullday Package
                                    </td>
                                </tr>
                                <tr class="border border-gray-200">
                                    <th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 ">
                                        Full Name
                                    </th>
                                    <td class="px-2 py-4">
                                        Radja Aulia Al Ramdani
                                    </td>
                                </tr>
                                <tr class="border border-gray-200">
                                    <th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 ">
                                        Email
                                    </th>
                                    <td class="px-2 py-4">
                                        radjaauliaalramdani@gmail.com
                                    </td>
                                </tr>
                                <tr class="border border-gray-200">
                                    <th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 ">
                                        Address
                                    </th>
                                    <td class="px-2 py-4">
                                        Bogor, Indonesia
                                    </td>
                                </tr>
                                <tr class="border border-gray-200">
                                    <th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 ">
                                        Payment Status
                                    </th>
                                    <td class="px-2 py-4">
                                        SETTLED
                                    </td>
                                </tr>
                                <tr class="border border-gray-200">
                                    <th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 ">
                                        TICKET UUID
                                        <br>
                                        (UNIQUE KEY)
                                    </th>
                                    <td class="px-2 py-4">
                                        123123123-123
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                </div>

                <div class="flex justify-between flex-col sm:flex-row w-full my-8 space-y-3">
                    <div class="max-w-md">
                        <h3 class="mb-2 text-slate-500 font-bold">Any Question ?</h3>
                        <p class="text-slate-500 text-sm">Please contact us via email contact@gatheringinbali.com or<br>
                             contact us via WhatsApp at +62 812-6756-0600</p>
                    </div>
                    <div class="max-w-md">
                        <h3 class="mb-2 font-semibold text-sm">gatheringinbali.com | shop.gatheringinbali.com</h3>
                        <p class="text-slate-500 text-sm">Skyview Apartment 7/26 Jl. Lengkong Gudang Timur Raya Kel Lengkong
                            Kota Tangerang Selatan, Banten 15311
                            Indonesia</p>
                    </div>
                </div>

            </div>
        </section> --}}
        <section id="" class="element bg-white mx-auto px-4" style="background-color: #ffffff; margin-left: auto; margin-right: auto; padding-left: 1rem;">
    <div class="container mx-auto my-auto flex flex-col items-center justify-center w-full overflow-auto">
        <div class="flex justify-between items-center w-full my-8">
            <div>
                <img src="https://shop.gatheringinbali.com/images/favicon.png" class="w-16 h-auto" alt="logo gib" style="width: 4rem; height: auto;">
            </div>
            <div class="flex flex-col justify-end text-slate-500 text-xs text-right">
                <h3>GatheringInBali</h3>
                <h3>PaymentID / Invoice #{{ $ticket->order->uuid }}</h3>
                <h3>{{  now()->format('D, d F Y') }}</h3>
            </div>
        </div>

        <div class="flex flex-col w-full mx-auto justify-center overflow-auto">
            <p class="text-left text-slate-500" style="text-align: left; color: #374151;">
                <span class="text-black font-semibold" style="color: #000; font-weight: bold;">Hi, Radja Aulia Al Ramdani</span>
                <br><br>
                Thank you for purchasing our products at gatheringinbali,<br>Below are your ticket details:
            </p>

            <table class="text-sm text-left text-gray-500 mt-4 break-words" style="font-size: 0.875rem; text-align: left; color: #6B7280; word-break: break-word;">
                <tbody class="break-words">
                    <tr class="border border-gray-200" style="border: 1px solid #E5E7EB;">
                        <th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50" style="padding-left: 0.5rem; padding-top: 1rem; padding-bottom: 1rem; font-weight: 600; color: #111827; white-space: nowrap; background-color: #F3F4F6;">
                            Product Name
                        </th>
                        <td class="px-2 py-4" style="padding-left: 0.5rem; padding-top: 1rem; padding-bottom: 1rem;">
                            {{ $ticket->program->title }}
                        </td>
                    </tr>
                    <tr class="border border-gray-200" style="border: 1px solid #E5E7EB;">
                        <th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50" style="padding-left: 0.5rem; padding-top: 1rem; padding-bottom: 1rem; font-weight: 600; color: #111827; white-space: nowrap; background-color: #F3F4F6;">
                            Full Name
                        </th>
                        <td class="px-2 py-4" style="padding-left: 0.5rem; padding-top: 1rem; padding-bottom: 1rem;">
                            {{ $ticket->user->name }}
                        </td>
                    </tr>
                    <tr class="border border-gray-200" style="border: 1px solid #E5E7EB;">
                        <th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50" style="padding-left: 0.5rem; padding-top: 1rem; padding-bottom: 1rem; font-weight: 600; color: #111827; white-space: nowrap; background-color: #F3F4F6;">
                            Email
                        </th>
                        <td class="px-2 py-4" style="padding-left: 0.5rem; padding-top: 1rem; padding-bottom: 1rem;">
                            {{ $ticket->user->email }}
                        </td>
                    </tr>
                    <tr class="border border-gray-200" style="border: 1px solid #E5E7EB;">
                        <th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50" style="padding-left: 0.5rem; padding-top: 1rem; padding-bottom: 1rem; font-weight: 600; color: #111827; white-space: nowrap; background-color: #F3F4F6;">
                            Address
                        </th>
                        <td class="px-2 py-4" style="padding-left: 0.5rem; padding-top: 1rem; padding-bottom: 1rem;">
                            {{$ticket->user->address}}
                        </td>
                    </tr>
                    <tr class="border border-gray-200" style="border: 1px solid #E5E7EB;">
                        <th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50" style="padding-left: 0.5rem; padding-top: 1rem; padding-bottom: 1rem; font-weight: 600; color: #111827; white-space: nowrap; background-color: #F3F4F6;">
                            Payment Status
                        </th>
                        <td class="px-2 py-4" style="padding-left: 0.5rem; padding-top: 1rem; padding-bottom: 1rem;">
                            SETTLED
                        </td>
                    </tr>
                    <tr class="border border-gray-200" style="border: 1px solid #E5E7EB;">
                        <th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50" style="padding-left: 0.5rem; padding-top: 1rem; padding-bottom: 1rem; font-weight: 600; color: #111827; white-space: nowrap; background-color: #F3F4F6;">
                            TICKET UUID<br>(UNIQUE KEY)
                        </th>
                        <td class="px-2 py-4" style="padding-left: 0.5rem; padding-top: 1rem; padding-bottom: 1rem;">
                            {{ $ticket->ticket_uuid }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="flex justify-between flex-col sm:flex-row w-full my-8 space-y-3">
            <div class="max-w-md">
                <h3 class="mb-2 text-slate-500 font-bold" style="margin-bottom: 0.5rem; color: #374151; font-weight: bold;">Any Question ?</h3>
                <p class="text-slate-500 text-sm" style="color: #374151; font-size: 0.875rem;">
                    Please contact us via email contact@gatheringinbali.com or<br>contact us via WhatsApp at +62 812-6756-0600
                </p>
            </div>
            <div class="max-w-md">
                <h3 class="mb-2 font-semibold text-sm" style="margin-bottom: 0.5rem; font-weight: bold; font-size: 0.875rem;">gatheringinbali.com | shop.gatheringinbali.com</h3>
                <p class="text-slate-500 text-sm" style="color: #374151; font-size: 0.875rem;">
                    Skyview Apartment 7/26 Jl. Lengkong Gudang Timur Raya Kel Lengkong<br>Kota Tangerang Selatan, Banten 15311<br>Indonesia
                </p>
            </div>
        </div>
    </div>
</section>


<script>
    window.print();
</script>
      </body>
</html>
