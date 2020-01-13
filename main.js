  $(function(){

    /* Tooltip */
    $('[data-toggle="tooltip"]').tooltip();

    /* Botão para atualizar o repasse selecionado */
    $('.btnConfirmUpChild').click(function(e) {
      e.preventDefault();
      const num_ob = $(this).data('id');
      let fields = {};
      const inputs = $('input[data-id="'+num_ob+'"]');

      inputs.each(function(){
       fields[this.name] = $(this).val();
     });
      fields.no = num_ob.split("_")[0];
      console.log("fields", fields);
    });

    /* Botão para habilitar o campo input e limpar/adicionar classes actInputChild e actBtnEdit */
    $('.btnEdRepChild,.wrapContainer h4').click(function(e) {
      e.preventDefault();
      let num_ob = $(this).data('id');     

      $('.inputEditChild').removeClass('actInputChild');
      $('.btnConfirmUpChild').removeClass('actBtnEdit');
      $('.inputEditChild[data-id="'+num_ob+'"]').addClass('actInputChild');
      $('.btnConfirmUpChild[data-id="'+num_ob+'"]').addClass('actBtnEdit');

    });

    /* Adicionar/remove class activeCollapse */
    $('.wrapContainer h4').click(function(e) {
      $('.collapseContent').removeClass('activeCollapse');
      $(this).siblings().toggleClass("activeCollapse");
    });
    /* Totalizando a coluna valores de todas as tabelas */

    $('.tableCustomChild').each(function(){
      totalizaColunaValores($(this));
    });

  }); /* End IIEF */

  function totalizaColunaValores(tableObj){/* Função para totalizar campos valores de todas as tabelas */
    let seletor = tableObj.eq(0).find('tbody tr td:nth-child(2)');
    let totalTrTdAllRows = 0;
    seletor.each(function(i){
      if( i <  (seletor.length - 1) ){
        totalTrTdAllRows += +$(this).text();
      }
    });

    let trTdLast = tableObj.eq(0).find('tbody tr:last-child td:nth-child(2)');
    let resultTotal = tableObj.eq(0).find('tbody tr:last-child td:nth-child(2)').html();
    // trTdLast.html(resultTotal + totalTrTdAllRows);/* Seta o valor no campo */
  }