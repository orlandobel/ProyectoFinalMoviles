const id = $("#id_editar");
const nombre = $("#nombre_editar");
const descripcion = $("#descripcion_editar");

const tablaMiembros = $("#miembrosGrupo");
const selector = $("#selector");
var grupo;
const gselector = $("#grupo_id");
function mostrarEditar(grupo) {
    id.val(grupo.id);
    nombre.val(grupo.nombre);
    descripcion.val(grupo.descripcion);
}

function cambiarGrupo(g) {
    grupo = g;
    const miembros = g.miembros;
    gselector.val(g.id);
    tablaMiembros.empty();

    if(miembros.length > 0){
        miembros.forEach(miembro => {
            const usuario = miembro.usuario;
            const tipo = (usuario.tipo === 0)? 'Alumno' : (usuario.tipo === 1)? 'Docente' : 'PAAE';
            const row =
                  `<tr>`
                    + `<td>` + usuario.nombre + `</td>`
                    + `<td>` + tipo + `</td>`
                    + `<td> <a href="/grupo/removeusuario/`+miembro.id+`" class="btn btn-danger">X</a>`
                + `</tr>`;

            tablaMiembros.append(row);
        });
    } else {
        tablaMiembros.append(`<tr><td colspan="3">No hay usuarios asignados a este grupo</td></tr>`);
    }

    selector.text(g.nombre);
}
