# FRACTÜM.

## Pendientes

*   Añadir estadísticas + Histórico.
*   Multi-Idioma *(i18n vs cookies).*
*   Subida de archivos. (ADJUNTOS)
*   Validaciones JS.
*   Solventar raiz de ejecución.
*   Devolución de errores controlada. (BD, subida de archivos...)


*	Vista permisos : editar nombre de permisos con JS con onclick y onblur



# Manual CORE.


## Métodos (*Acción*)

1.  **Creator**: Insercción de un objeto concreto en la BD.
2.  **Puller**: Listado de todos los objetos concretos de una tabla o vista.
3.  **Reader**: Consulta de un objeto concreto.
4.  **Updater**: Modificación de un objeto concreto.
5.  **Eraser**: Eliminación de un objeto concreto.
6.  **Seeker**: Busqueda basada en *keywords*.  ***(NO IMPLEMENTADO)***


## Esquema URL

Para realizar cualquier movimiento en la app (e.g.):

-   **URL**: *../../../Back/RequestManager.php?***actors**=**X1**,**X2**&**actions**=**Y1**,**Y2**&**targets**=**S/A**,**S/A**
    -   **X1, X2**: Objeto izquierda y Objeto derecha.
    -   **Y1, Y2**: Método del objeto izquierda y método del objeto derecha.
    -   **S**: *Flujo normal*, mi vista destino es la del método que realizó la petición.
    -   **A**: *Flujo alternativo*, su ejecución es de mayor prioridad que la **S** y la vista destino no tiene porque ser el método que realizó la pertición.
    -   **Dependency**: *... En desarrollo ...*

Estas peticiones, devolverán *Siempre* una vista (*Layout*):

-   **URL**: ../../Front/View/Layout.php?**actors**=**X1,X2**&**actions**=**Y1,Y2**
    -   El significado de **X1, X2, Y1, Y2** es el mismo que en el apartado anterior.