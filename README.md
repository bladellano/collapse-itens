# Collapse para listar itens com campos editáveis!
  - Lista tabelas com campos editáveis
  - Botões para editar cada ítem
# Configurar transição
- No arquivo `style.css` faça:
> class `collapseContent`
Descomentar:
overflow:auto; transition: height 0.4s;
Comentar:
height:opx; overflow:hidden;

> class `collapseContent.activeCollapse`
Descomentar:
height: 200px;
Comentar:
height: auto;
