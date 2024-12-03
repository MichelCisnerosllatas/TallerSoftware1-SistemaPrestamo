import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/theme.css',
                'resources/css/Caja/styleCaja.css',
                'resources/css/Clientes/styleClientes.css',
                'resources/css/Clientes/styleSeleccionarCliente.css',
                'resources/css/Dashboard/styleDashboard.css',
                'resources/css/Empresa/styleEmpresa.css',
                'resources/css/Permisos/stylePermisos.css',
                'resources/css/Prestamos/stylePrestamos.css',
                'resources/css/Pagos/stylePagos.css',
                'resources/css/Principal/stylePrincipal.css',
                'resources/css/Reporte/styleReporte.css',
                'resources/css/Rol/styleRol.css',
                'resources/css/Usuarios/styleUsuarios.css',
                'resources/css/Ajustes/styleAjustes.css',
                'resources/css/Perfil/stylePerfil.css',

                'resources/js/Caja/appCaja.js',
                'resources/js/Clientes/appCliente.js',
                'resources/js/Clientes/appSelecionarCliente.js',
                'resources/js/Dashboard/appDashboard.js',
                'resources/js/Empresa/appEmpresa.js',
                'resources/js/Permisos/appPermisos.js',
                'resources/js/Prestamos/appPrestamos.js',
                'resources/js/Pagos/appPagos.js',
                'resources/js/Principal/appPrincipal.js',
                'resources/js/Principal/menuUsuario.js',
                'resources/js/Reporte/appReporte.js',
                'resources/js/Rol/appRol.js',
                'resources/js/Usuarios/appUsuarios.js',
                'resources/js/Ajustes/appAjustes.js',
                'resources/js/Perfil/appPerfil.js',

                'resources/js/app.js',
                'resources/js/Login.js',
            ],
            refresh: true,
        }),
    ],
});
