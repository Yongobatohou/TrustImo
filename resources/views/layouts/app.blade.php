<?php use App\Models\User;?>
@extends('layouts/base')


@section('base')

    <div class="h-screen flex overflow-hidden " x-data="{ sidebarOpen: false, dropdownOpen: false }" @keydown.window.escape="sidebarOpen = false">
        <!-- Off-canvas menu for mobile -->
        <div x-show="sidebarOpen" class="md:hidden" style="display: none;">
            <div class="fixed inset-0 flex z-40 w-56">
                <div @click="sidebarOpen = false" x-show="sidebarOpen"
                    x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state."
                    x-transition:enter="transition-opacity ease-linear duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition-opacity ease-linear duration-300"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0"
                    style="display: none;">
                    <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
                </div>
                <div x-show="sidebarOpen" x-description="Off-canvas menu, show/hide based on off-canvas menu state."
                    x-transition:enter="transition ease-in-out duration-300 transform"
                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                    x-transition:leave="transition ease-in-out duration-300 transform"
                    x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                    class="relative flex-1 flex flex-col max-w-xs w-full bg-green-800" style="display: none;">
                    <div class="absolute top-0 right-0 -mr-14 p-1">
                        <button x-show="sidebarOpen" @click="sidebarOpen = false"
                            class="flex items-center justify-center h-12 w-12 rounded-full focus:outline-none focus:bg-gray-600"
                            aria-label="Close sidebar" style="display: none;">
                            <svg class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto bg-white">
                        <div class="flex items-center flex-shrink-0 bg-white rounded-full ml-4">
                          <img class="w-20 my-2" src="https://i.postimg.cc/VNTfK4L1/Logo-TIC.png" alt="Tic Logo">
                        </div>
                        <nav class="space-y-1 flex-1 px-2 ">
                            <div class="mb-4">
                                <a href="/dashboard"
                                    class="bg-slate-600 group flex items-center px-2 py-3 text-semibold font-medium rounded-md
                                    {{ request()->is('dashboard') ? ' text-white bg-green-600 bg-opacity-75 p-3' : 'hover:bg-gray-200' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>

                                    <span class="mx-2">Dashboard</span>
                                </a>
                            </div>
                            <hr class="py-2">

                        </nav>
                    </div>

                </div>
                <div class="flex-shrink-0 w-14">
                    <!-- Force sidebar to shrink to fit close icon -->
                </div>
            </div>
        </div>

        <!-- Static sidebar for desktop -->
        <div class="hidden md:flex md:flex-shrink-0 text-sm" style="height:auto; box-shadow: 20px 4px 54px rgba(0, 0, 0, 0.06);">
            <div class="flex flex-col w-auto border-r border-gray-200 bg-white">
                <div class="h-0 flex-1 flex flex-col pt-5 overflow-y-auto text-sm p-5">
                    <div class="flex items-center flex-shrink-0 bg-white rounded-full ml-5 px-5">
                        <img class="w-20 my-2" src="https://i.postimg.cc/VNTfK4L1/Logo-TIC.png" alt="Tic Logo">
                    </div>
                    <hr class="py-2" style="box-shadow: 20px 4px 54px rgba(0, 0, 0, 0.06); ">
                    <!-- Sidebar component, swap this element with another sidebar if you like -->
                    <nav class="space-y-1 flex-1 px-2 ">
                        <div class="mb-4">
                            <a href="/dashboard"
                                class="bg-slate-600 group flex items-center px-2 py-3 text-sm font-semibold rounded-md
                                {{ request()->is('dashboard') ? ' text-white bg-green-500 bg-opacity-75 p-3' : 'hover:bg-green-500 hover:bg-opacity-75 p-3 hover:text-white' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>

                                  <span class="mx-2">Dashboard</span>
                            </a>
                        </div>
                        <hr class="py-2">
                        <div>
                            @if(Auth::check())
                            <a href=""
                                class="bg-slate-600 h-10 group flex items-center px-2 py-3 text-sm font-medium rounded-md mt-2 mb-2
                                {{ request()->is('emploiyes') ? ' text-white bg-green-500 bg-opacity-75 p-3' : 'hover:bg-green-500 hover:bg-opacity-75 p-3 hover:text-white ' }}">
                                <!-- Heroicon name: outline/users -->
                                <svg class="h-6 w-6 pr-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"></path>
                                    </svg>
                                <span class="mx-2">Employés</span>
                            </a>
                            <a href="/users"
                                class="bg-slate-600 h-10 group flex items-center px-2 py-3 text-sm font-medium rounded-md mt-2 mb-2
                                {{ request()->is('users') ? ' text-white bg-green-500 bg-opacity-75 p-3' : 'hover:bg-gray-200' }}">
                                <!-- Heroicon name: outline/users -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                                <span class="mx-2">Utilisateurs</span>
                            </a>
                            <a href=""
                                class="bg-slate-600 h-10 group flex items-center px-2 py-3 text-sm font-medium rounded-md mt-2 mb-2
                                {{ request()->is('materiels') ? ' text-white bg-green-500 bg-opacity-75 p-3' : 'hover:bg-green-500 hover:bg-opacity-75 p-3 hover:text-white' }}">
                                <!-- Heroicon name: outline/users -->
                                <svg class="h-6 w-6 pr-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"></path>
                                </svg>
                                <span class="mx-2">Materiels</span>
                            </a>
                            @endif
                            <a href=""
                                class="bg-slate-600 h-10 group flex items-center px-2 py-3 text-sm font-medium rounded-md mt-2 mb-2
                                {{ request()->is('rapports') ? ' text-white bg-green-500 bg-opacity-75 p-3' : 'hover:bg-green-500 hover:bg-opacity-75 p-3 hover:text-white' }}">
                                <!-- Heroicon name: outline/users -->
                                <svg class="h-6 w-6 pr-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z"></path>
                                </svg>
                                <span class="mx-2">Rapports</span>
                            </a>
                            <a href=""
                                class="bg-slate-600 h-10 group flex items-center px-2 py-3 text-sm font-medium rounded-md mt-2 mb-2
                                {{ request()->is('absence') ? ' text-white bg-green-500 bg-opacity-75 p-3' : 'hover:bg-green-500 hover:bg-opacity-75 p-3 hover:text-white' }}">
                                <!-- Heroicon name: outline/users -->
                                <svg class="h-6 w-6 pr-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9"></path>
                                </svg>
                                <span class="mx-2">Absence & Permission</span>
                            </a>
                            <a href=""
                                class="bg-slate-600 h-10 group flex items-center px-2 py-3 text-sm font-medium rounded-md mt-2 mb-2
                                {{ request()->is('documents') ? ' text-white bg-green-500 bg-opacity-75 p-3' : 'hover:bg-green-500 hover:bg-opacity-75 p-3 hover:text-white' }}">
                                <!-- Heroicon name: outline/users -->
                                <svg class="h-6 w-6 pr-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9"></path>
                                </svg>
                                <span class="mx-2">Documents</span>
                            </a>
                            <a href=""
                                class="bg-slate-600 h-10 group flex items-center px-2 py-3 text-sm font-medium rounded-md mt-2 mb-2
                                {{ request()->is('couriers') ? ' text-white bg-green-500 bg-opacity-75 p-3' : 'hover:bg-green-500 hover:bg-opacity-75 p-3 hover:text-white' }}">
                                <!-- Heroicon name: outline/users -->
                                <svg class="h-6 w-6 pr-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9"></path>
                                </svg>
                                <span class="mx-2">Couriers</span>
                            </a>
                        </div>
                        <hr class="py-2" style="padding: 0;">
                        <div >
                            <ul class=" space-y-2 py-1 text-sm text-gray-700 " aria-labelledby="dropdownDefaultButton1">

                                <li>
                                    <a type="button" class="bg-slate-600 group flex text-sm font-medium rounded-md mb-4 " aria-controls="dropdown-example1" data-collapse-toggle="dropdown-example1">
                                        <span class="flex-1 text-left text-md whitespace-nowrap " sidebar-toggle-item>Mission</span>
                                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </a>
                                    <ul id="dropdown-example1" class="hidden space-y-2">
                                        <li>
                                            <a href=""
                                                class="bg-slate-600 h-10 group flex items-center px-2 py-3 text-sm font-medium rounded-md mt-2 mb-2
                                                {{ request()->is('') ? ' text-white bg-green-500 bg-opacity-75 p-3' : 'hover:bg-green-500 hover:bg-opacity-75 p-3 hover:text-white' }}">
                                                <!-- Heroicon name: outline/users -->
                                                <svg class="h-6 w-6 pr-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                                                </svg>
                                                <span class="mx-2">Ordre de Mission</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href=""
                                                class="bg-slate-600 h-10 group flex items-center px-2 py-3 text-sm font-medium rounded-md mt-2 mb-2
                                                {{ request()->is('') ? ' text-white bg-green-500 bg-opacity-75 p-3' : 'hover:bg-green-500 hover:bg-opacity-75 p-3 hover:text-white' }}">
                                                <!-- Heroicon name: outline/users -->
                                                <svg class="h-6 w-6 pr-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122"></path>
                                                </svg>
                                                <span class="mx-2">TDR de Mission</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href=""
                                                class="bg-slate-600 h-10 group flex items-center px-2 py-3 text-sm font-medium rounded-md mt-2 mb-2
                                                {{ request()->is('') ? ' text-white bg-green-500 bg-opacity-75 p-3' : 'hover:bg-green-500 hover:bg-opacity-75 p-3 hover:text-white' }}">
                                                <!-- Heroicon name: outline/users -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pr-2" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                                    </path>
                                                </svg>
                                                <span class="mx-2">Rapport de Mission</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <hr class="py-2" style="padding: 0;">

                        <div >
                            <ul class=" space-y-2 py-1 text-sm text-gray-700 " aria-labelledby="dropdownDefaultButton2">

                                <li>
                                    <a type="button" class="bg-slate-600 group flex text-sm font-medium rounded-md mb-4" aria-controls="dropdown-example2" data-collapse-toggle="dropdown-example2">
                                        <span class="flex-1 text-left text-md whitespace-nowrap" sidebar-toggle-item>Comptabilité</span>
                                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </a>
                                    <ul id="dropdown-example2" class="hidden space-y-2">
                                        <li>
                                            <a href=""
                                                class="bg-slate-600 h-10 group flex items-center px-2 py-3 text-sm font-medium rounded-md mt-2 mb-2
                                                {{ request()->is('') ? ' text-white bg-green-500 bg-opacity-75 p-3' : 'hover:bg-green-500 hover:bg-opacity-75 p-3 hover:text-white' }}">
                                                <!-- Heroicon name: outline/users -->
                                                <svg class="h-6 w-6 pr-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                                                </svg>
                                                <span class="mx-2">Bon de Caisse</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href=""
                                                class="bg-slate-600 h-10 group flex items-center px-2 py-3 text-sm font-medium rounded-md mt-2 mb-2
                                                {{ request()->is('') ? ' text-white bg-green-500 bg-opacity-75 p-3' : 'hover:bg-green-500 hover:bg-opacity-75 p-3 hover:text-white' }}">
                                                <!-- Heroicon name: outline/users -->
                                                <svg class="h-6 w-6 pr-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122"></path>
                                                </svg>
                                                <span class="mx-2">Facture ProFormat</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href=""
                                                class="bg-slate-600 h-10 group flex items-center px-2 py-3 text-sm font-medium rounded-md mt-2 mb-2
                                                {{ request()->is('') ? ' text-white bg-green-500 bg-opacity-75 p-3' : 'hover:bg-green-500 hover:bg-opacity-75 p-3 hover:text-white' }}">
                                                <!-- Heroicon name: outline/users -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pr-2" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                                    </path>
                                                </svg>
                                                <span class="mx-2">Bon de Commande</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href=""
                                                class="bg-slate-600 h-10 group flex items-center px-2 py-3 text-sm font-medium rounded-md mt-2 mb-2
                                                {{ request()->is('') ? ' text-white bg-green-500 bg-opacity-75 p-3' : 'hover:bg-green-500 hover:bg-opacity-75 p-3 hover:text-white' }}">
                                                <!-- Heroicon name: outline/users -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pr-2" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                                    </path>
                                                </svg>
                                                <span class="mx-2">Bordereaux de Livraison</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <hr class="py-2" style="padding: 0;">

                        <div >
                            <ul class=" space-y-2 py-1 text-sm text-gray-700 " aria-labelledby="dropdownDefaultButton3">

                                <li>
                                    <a type="button" class="bg-slate-600 group flex text-sm font-medium rounded-md mb-4" aria-controls="dropdown-example3" data-collapse-toggle="dropdown-example3">
                                        <span class="flex-1 text-left text-md whitespace-nowrap" sidebar-toggle-item>Permission  d'absence</span>
                                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </a>
                                    <ul id="dropdown-example3" class="hidden space-y-2">
                                        <li>
                                            <a href=""
                                                class="bg-slate-600 h-10 group flex items-center px-2 py-3 text-sm font-medium rounded-md mt-2 mb-2
                                                {{ request()->is('') ? ' text-white bg-green-500 bg-opacity-75 p-3' : 'hover:bg-green-500 hover:bg-opacity-75 p-3 hover:text-white' }}">
                                                <!-- Heroicon name: outline/users -->
                                                <svg class="h-6 w-6 pr-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                                                </svg>
                                                <span class="mx-2">Demande  d'absence</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href=""
                                                class="bg-slate-600 h-10 group flex items-center px-2 py-3 text-sm font-medium rounded-md mt-2 mb-2
                                                {{ request()->is('') ? ' text-white bg-green-500 bg-opacity-75 p-3' : 'hover:bg-green-500 hover:bg-opacity-75 p-3 hover:text-white' }}">
                                                <!-- Heroicon name: outline/users -->
                                                <svg class="h-6 w-6 pr-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122"></path>
                                                </svg>
                                                <span class="mx-2">Autorisation d'absence</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>




                    </nav>
                </div>


            </div>
        </div>

        <div class="flex flex-col w-0 flex-1 overflow-hidden ">
            <div class="relative z-10 flex-shrink-0 flex h-20 bg-white ">
                <button type="button" @click.stop="sidebarOpen = true"
                    class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-green-500 md:hidden">
                    <span class="sr-only">Open sidebar</span>
                    <!-- Heroicon name: outline/menu-alt-2 -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </button>
                <div class="flex-1 px-4 flex justify-between">
                    <div class="flex-1 flex">
                    </div>
                    <div class="ml-4 flex items-center md:ml-6">
                        <button
                            class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <span class="sr-only">View notifications</span>
                            <!-- Heroicon name: outline/bell -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>

                        <!-- Profile dropdown -->
                        <div class="ml-3 relative" @click.away="dropdownOpen = false">
                            <div>
                                <button type="button" @click="dropdownOpen = !dropdownOpen"
                                    class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-10 w-10 border-2 rounded-full" src="https://i.postimg.cc/mDyt7dkD/blank-profile-picture-973460-340.webp"
                                        alt="">
                                </button>
                            </div>
                            <div x-show="dropdownOpen"
                                class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1" style="display: none;">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="user-menu-item-0">Votre profil</a>

                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="user-menu-item-1">Paramètre</a>

                                <a href="/logout" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="user-menu-item-2">Déconnexion</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="py-2">

            <main class="flex-1 relative z-0 overflow-y-auto px-6 focus:outline-none md:py-6" tabindex="0">
                <div class="max-w-7xl mx-auto">
                    @yield('app')
                </div>
            </main>
        </div>

    </div>
@endsection
