<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm } from "@inertiajs/vue3";

// Definir los datos del formulario
const form = useForm({
    nombre: "",
    edad: "",
    genero: "",
    educacion: "",
    institucion: "",
    departamento: "",
    direccion_institucion: "",
    ciudad: "",
    estado: "",
    tipo_institucion: "",
    telefono_oficina: "",
    telefono_personal: "",
    correo_institucional: "",
    correo_personal: "",
    temas_investigacion: "",
});

// Función para enviar el formulario
const submit = () => {
    console.log("Botón 'Registrar' presionado");
    
    form.post(route("register"), {
        onFinish: () => {
            console.log("Formulario enviado con éxito");
            form.reset(); // Resetea el formulario después del envío
        },
        onError: (errors) => {
            console.error("Errores al enviar el formulario:", errors);
        },
    });
};

</script>
   

<template>
    <GuestLayout>
        <Head title="Ficha de Registro" />
        <form @submit.prevent="submitForm">
            <div class="max-w-5xl mx-auto p-8 bg-white rounded-lg shadow-md ring-1 ring-gray-200">
                <h2 style="text-align: center; margin-bottom: 20px;" class="text-2xl font-bold">RED ESTATAL DE INVESTIGADORES EN MATERIA EDUCATIVA</h2>
                <h3 style="text-align: center;" class="text-2xl font-bold">Ficha de Registro</h3>

                <!-- Información Personal -->
                <section class="mb-6">
                    <h4 class="text-lg font-semibold mb-4">Información Personal</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nombre Completo</label>
                            <input v-model="form.nombreCompleto" type="text" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Nombre completo">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Edad</label>
                            <input v-model="form.edad" type="number" min="0" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Edad">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Sexo</label>
                            <select v-model="form.sexo" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                                <option value="">Selecciona una opción</option>
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Grado Máximo de Estudios</label>
                            <input v-model="form.gradoEstudios" type="text" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Ej. Doctorado">
                        </div>
                    </div>
                </section>

                <!-- Información Institucional -->
                <section class="mb-6">
                    <h4 class="text-lg font-semibold mb-4">Información Institucional</h4>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Institución donde labora</label>
                        <input v-model="form.institucion" type="text" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Nombre de la institución">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Departamento o Área de Adscripción</label>
                            <input v-model="form.departamento" type="text" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Departamento o área">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Dirección de la Institución</label>
                            <input v-model="form.direccionInstitucion" type="text" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Dirección">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Ciudad</label>
                            <input v-model="form.ciudad" type="text" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Ciudad">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Estado</label>
                            <input v-model="form.estado" type="text" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Estado">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tipo de Institución</label>
                            <select v-model="form.tipoInstitucion" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                                <option value="">Selecciona una opción</option>
                                <option value="publica">Pública</option>
                                <option value="privada">Privada</option>
                            </select>
                        </div>
                    </div>
                </section>

                <!-- Información de Contacto -->
                <section class="mb-6">
                    <h4 class="text-lg font-semibold mb-4">Información de Contacto</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Teléfono de Oficina</label>
                            <input v-model="form.telefonoOficina" type="tel" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Teléfono de oficina">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Celular Particular</label>
                            <input v-model="form.celular" type="tel" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Número de celular">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email Institucional</label>
                            <input v-model="form.emailInstitucional" type="email" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Correo institucional">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email Personal</label>
                            <input v-model="form.emailPersonal" type="email" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Correo personal">
                        </div>
                    </div>
                </section>

                <!-- Información Académica -->
                <section class="mb-6">
                    <h4 class="text-lg font-semibold mb-4">Información Académica</h4>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Línea de Investigación</label>
                        <input v-model="form.lineaInvestigacion" type="text" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Línea de investigación">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nivel Educativo</label>
                        <input v-model="form.nivelEducativo" type="text" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Nivel educativo del proyecto">
                    </div>
                </section>

                <!-- Credenciales de Usuario -->
                <section class="mb-6">
                    <h4 class="text-lg font-semibold mb-4">Credenciales de Usuario</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Usuario</label>
                            <input v-model="form.usuario" type="text" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Nombre de usuario">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Correo</label>
                            <input v-model="form.correo" type="email" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Correo electrónico">
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Contraseña</label>
                            <input v-model="form.contrasena" type="password" class="w-full mt-1 p-2 border border-gray-300 rounded-md" placeholder="Contraseña">
                        </div>
                    </div>
                </section>

                <!-- Botón de Enviar -->
                <form @submit.prevent="submit">
                    <button
                        type="submit"
                        class="w-full mt-4 p-3 bg-blue-600 text-white rounded-md hover:bg-blue-700"
                        >
                        Registrar
                    </button>
                </form>
            </div>
        </form>
    </GuestLayout>
</template>
