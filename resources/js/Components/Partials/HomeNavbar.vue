<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import NavLink from "@/Components/NavLink.vue";

const showingNavigationDropdown = ref(false);

const props = defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

const emit = defineEmits(["openModal", "closeModal"]);
</script>

<template>
    <nav
        class="fixed z-50 w-full bg-neutral-50 p-4"
    >
        <!-- Primary Navigation Menu -->
        <div class="flex justify-between">
            <div class="flex justify-between">
                <!-- Logo -->
                <Link :href="route('home')">
                    <ApplicationLogo />
                </Link>

                <!-- Search input-->
                <!-- <div class="relative shrink-0 hidden sm:flex items-center w-1/2">
						<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
							<font-awesome-icon :icon=" [ 'fas', 'magnifying-glass' ] " class="w-4 h-4 text-neutral-500" />
						</div>
						<input type="search" id="default-search" class="block w-full p-2 pl-10 text-sm text-neutral-900 rounded-full bg-neutral-200 border-0 focus:ring-2 focus:ring-neutral-400" placeholder="Buscar información" required />
						<button type="submit"
							class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
					</div> -->
            </div>

            <!-- 	Main dropdown menu-->
            <div class="-mr-2 flex items-center sm:hidden">
                <button
                    @click="
                        showingNavigationDropdown = !showingNavigationDropdown
                    "
                    class="inline-flex items-center justify-center rounded-md p-2 text-neutral-400 transition duration-150 ease-in-out hover:bg-neutral-100 hover:text-neutral-500 focus:bg-neutral-100 focus:text-neutral-500 focus:outline-none"
                >
                    <svg
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            :class="{
                                hidden: showingNavigationDropdown,
                                'inline-flex': !showingNavigationDropdown,
                            }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                        <path
                            :class="{
                                hidden: !showingNavigationDropdown,
                                'inline-flex': showingNavigationDropdown,
                            }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>

            <!--Login, Register and more options dropdown menu-->
            <div class="hidden items-center justify-between gap-6 sm:flex">
                <NavLink :href="route('home')" :active="$page.url === '/'">
                    Inicio
                </NavLink>
                <!-- Divulgación -->
                <div class="relative">
                    <Dropdown align="right" width="56">
                        <template #trigger>
                            <span
                                class="inline-flex cursor-pointer items-center rounded-xl px-4 py-2 font-bold transition duration-150 ease-in-out hover:text-sky-500"
                                :class="{
                                    'text-sky-500':
                                        $page.url === '/books' ||
                                        $page.url === '/magazines' ||
                                        $page.url === '/hist-publications' ||
                                        $page.url === '/investigations',
                                    'text-gray-500':
                                        $page.url !== '/books' ||
                                        $page.url !== '/magazines' ||
                                        $page.url !== '/hist-publications' ||
                                        $page.url !== '/investigations',
                                }"
                            >
                                Divulgación
                            </span>
                        </template>

                        <template #content>
                            <div class="flex flex-col">
                                <NavLink
                                    :href="route('guest.books.index')"
                                    :active="
                                        route().current('books.index') ||
                                        $page.url.includes('books')
                                    "
                                >
                                    Libros
                                </NavLink>
                                <NavLink
                                    :href="route('guest.magazines.index')"
                                    :active="$page.url.includes('magazines')"
                                >
                                    Revistas
                                </NavLink>
                                <NavLink
                                    :href="
                                        route('guest.hist-publications.index')
                                    "
                                    :active="
                                        $page.url.includes('hist-publications')
                                    "
                                >
                                    Publicaciones
                                </NavLink>
                                <NavLink
                                    :href="route('guest.investigations.index')"
                                    :active="
                                        $page.url.includes('investigations')
                                    "
                                >
                                    Investigaciones
                                </NavLink>
                            </div>
                        </template>
                    </Dropdown>
                </div>
                <!-- Innovación -->
                <div class="relative">
                    <Dropdown align="right" width="56">
                        <template #trigger>
                            <span
                                class="inline-flex cursor-pointer items-center rounded-xl px-4 py-2 font-bold transition duration-150 ease-in-out hover:text-sky-500"
                                :class="{
                                    'text-sky-500':
                                        $page.url.includes(
                                            'educational-software',
                                        ) || $page.url.includes('infographics'),
                                    'text-gray-500':
                                        !$page.url.includes(
                                            'educational-software',
                                        ) ||
                                        !$page.url.includes('infographics'),
                                }"
                            >
                                Innovación
                            </span>
                        </template>

                        <template #content>
                            <div class="flex flex-col">
                                <NavLink
                                    :href="
                                        route(
                                            'guest.educational-software.index',
                                        )
                                    "
                                    :active="
                                        route().current(
                                            'guest.educational-software.index',
                                        ) ||
                                        $page.url.includes(
                                            'educational-software',
                                        )
                                    "
                                >
                                    Software educativo
                                </NavLink>
                                <NavLink
                                    :href="route('guest.infographics.index')"
                                    :active="
                                        route().current(
                                            'guest.infographics.index',
                                        ) || $page.url.includes('infographics')
                                    "
                                >
                                    Infografías
                                </NavLink>
                            </div>
                        </template>
                    </Dropdown>
                </div>
                <!-- Vinculación -->
                <div class="relative">
                    <Dropdown align="right" width="56">
                        <template #trigger>
                            <span
                                class="inline-flex cursor-pointer items-center rounded-xl px-4 py-2 font-bold transition duration-150 ease-in-out hover:text-sky-500"
                                :class="{
                                    'text-sky-500':
                                        $page.url.includes('social-service') ||
                                        $page.url.includes(
                                            'profesional-practice',
                                        ) ||
                                        $page.url.includes(
                                            'vinculation-documents',
                                        ),
                                    'text-gray-500':
                                        !$page.url.includes('social-service') ||
                                        !$page.url.includes(
                                            'profesional-practice',
                                        ) ||
                                        !$page.url.includes(
                                            'vinculation-documents',
                                        ),
                                }"
                            >
                                Vinculación
                            </span>
                        </template>

                        <template #content>
                            <div class="flex flex-col">
                                <NavLink
                                    :href="route('social-service')"
                                    :active="route().current('social-service')"
                                >
                                    Servicio social
                                </NavLink>
                                <NavLink
                                    :href="route('profesional-practice')"
                                    :active="
                                        route().current('profesional-practice')
                                    "
                                >
                                    Residencia
                                </NavLink>
                                <NavLink
                                    :href="route('vinculation-documents')"
                                    :active="
                                        route().current('vinculation-documents')
                                    "
                                >
                                    Documentos
                                </NavLink>
                            </div>
                        </template>
                    </Dropdown>
                </div>
                <NavLink
                    :href="route('guest.convocations.index')"
                    :active="
                        route().current('guest.convocations.index') ||
                        $page.url.includes('convocations')
                    "
                >
                    Convocatorias
                </NavLink>
                <NavLink
                    :href="route('guest.gallery.index')"
                    :active="
                        route().current('guest.gallery.index') ||
                        $page.url.includes('gallery')
                    "
                >
                    Galería
                </NavLink>
                <NavLink
                    :href="route('reime')"
                    :active="route().current('reime')"
                >
                    REIME
                </NavLink>
                <NavLink
                    :href="route('guest.contact.index')"
                    :active="route().current('guest.contact.index')"
                >
                    Contacto
                </NavLink>

                <div
                    v-if="canLogin && $page.props.auth.user.name !== null"
                    class="hidden sm:flex sm:items-center"
                >
                    <Link
                        v-if="$page.props.auth.user.role === 'admin'"
                        :href="route('admin.dashboard')"
                        class="rounded-md bg-sky-500 px-4 py-2 font-medium text-white transition-all ease-in-out hover:bg-sky-600 focus:no-underline"
                    >
                        Dashboard
                    </Link>
                    <Link
                        v-else-if="
                            $page.props.auth.user.role === 'editor' ||
                            $page.props.auth.user.role === 'user'
                        "
                        :href="route('profile.edit')"
                        class="rounded-md bg-sky-500 px-4 py-2 font-medium text-white transition-all ease-in-out hover:bg-sky-600 focus:no-underline"
                    >
                        {{ $page.props.auth.user.name }}
                    </Link>
                </div>
                <template v-if="!$page.props.auth.user.name">
                    <!-- <Link :href=" route( 'login' ) "
							class="font-bold text-neutral-50 bg-neutral-900 px-5 py-2 rounded-full hover:bg-neutral-700 focus:no-underline transition-all duration-200">
						Iniciar sesión</Link> -->
                    <button
                        @click="emit('openModal', 'login')"
                        class="hidden rounded-xl bg-sky-400 px-4 py-2 font-bold text-neutral-50 transition-all duration-200 hover:bg-sky-600 hover:text-neutral-50 focus:no-underline sm:block"
                    >
                        Iniciar sesión
                    </button>
                    <!-- <Link v-if=" canRegister " :href=" route( 'register' ) "
							class="ml-6 font-medium text-neutral-50 bg-neutral-900 px-4 py-2 rounded-full hover:bg-neutral-700 focus:no-underline">
						Registrarse</Link> -->
                </template>
                <!-- Settings Dropdown -->
                <!-- <div class="hidden sm:flex sm:items-center sm:justify-center">
						<div class="relative">
							<Dropdown align="right" width="56">
								<template #trigger>
									<div class="flex items-center p-1">
										<img class="h-8 w-8 cursor-pointer" v-if=" $page.props.auth.user.name "
											src="/storage/images/default-contact.png" alt="perfil">
										<font-awesome-icon v-else :icon=" { prefix: 'fa', iconName: 'bars' } "
											class=" h-7 w-7 text-neutral-900 cursor-pointer hover:ring-1 hover:ring-neutral-300 focus:ring-1 focus:ring-neutral-300 p-1 rounded-lg" />
									</div>
								</template>

								<template #content>
									<div v-if=" $page.props.auth.user.name ">
										<DropdownLink :href=" route( 'profile.edit' ) ">
											Editar perfil
										</DropdownLink>
										<DropdownLink :href=" route( 'logout' ) " method="post" as="button">
											Cerrar sesión
										</DropdownLink>
									</div>
									<div v-else>
										<span
											class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out cursor-pointer"
											@click="emit( 'openModal', 'login' )">
											Iniciar sesión
										</span>
										<span
											class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out cursor-pointer"
											@click="emit( 'openModal', 'register' )">
											Registrarse
										</span>
									</div>
								</template>
							</Dropdown>
						</div>
					</div> -->
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div
            :class="{
                block: showingNavigationDropdown,
                hidden: !showingNavigationDropdown,
            }"
            class="transition duration-300 sm:hidden"
        >
            <!-- <div class="pt-2 pb-3 space-y-1">
				<ResponsiveNavLink v-if=" $page.props.auth.user.name " :href=" route( 'dashboard' ) "
					:active=" route().current( 'admin.dashboard' ) ">
					Dashboard
				</ResponsiveNavLink>
			</div> -->
            <div class="pb-3 pt-2">
                <div class="relative flex w-full shrink-0 items-center p-2">
                    <div
                        class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-5"
                    >
                        <font-awesome-icon
                            :icon="{
                                prefix: 'fas',
                                iconName: 'magnifying-glass',
                            }"
                            class="h-4 w-4 text-neutral-500"
                        />
                    </div>
                    <input
                        type="search"
                        id="default-search"
                        class="block w-full rounded-full border-0 bg-neutral-200 p-2 pl-10 text-sm text-neutral-900 focus:ring-2 focus:ring-neutral-400"
                        placeholder="Buscar información"
                        required
                    />
                    <!-- <button type="submit"
						class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button> -->
                </div>
                <ResponsiveNavLink
                    @click="showingNavigationDropdown = false"
                    :href="route('home')"
                    :active="route().current('home')"
                >
                    Inicio
                </ResponsiveNavLink>
                <!-- <ResponsiveNavLink @click="showingNavigationDropdown = false" :href=" route( 'divulgation' ) "
					:active=" route().current( 'divulgation' ) ">
					Divulgación
				</ResponsiveNavLink>
				<ResponsiveNavLink @click="showingNavigationDropdown = false" :href=" route( 'divulgation' ) "
					:active=" route().current( 'divulgation' ) ">
					Innovación
				</ResponsiveNavLink> -->
                <!-- <ResponsiveNavLink @click="showingNavigationDropdown = false" :href=" route( 'convocations.index' ) "
					:active=" route().current( 'convocations.index' ) ">
					Convocatorias
				</ResponsiveNavLink>
				<ResponsiveNavLink @click="showingNavigationDropdown = false" :href=" route( 'gallery.index' ) "
					:active=" route().current( 'gallery.index' ) ">
					Galería
				</ResponsiveNavLink> -->
                <ResponsiveNavLink
                    @click="showingNavigationDropdown = false"
                    :href="route('reime')"
                    :active="route().current('reime')"
                >
                    REIME
                </ResponsiveNavLink>
                <ResponsiveNavLink
                    @click="showingNavigationDropdown = false"
                    :href="route('guest.contact.index')"
                    :active="route().current('guest.contact.index')"
                >
                    Contacto
                </ResponsiveNavLink>
            </div>
        </div>
    </nav>
</template>
