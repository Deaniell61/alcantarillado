  <div id="contenidoCrud">
  
      <!-- ********************************** tabla inicio ********************************** -->

     
      
      <div class="centrartabla">


          <table>
              <tr>
                  <td class="">
                      <div class="input-field ">
                          <a id="modalnuevoP" onClick="abrirProvNuevo();" class="waves-effect waves-light btn blue lighten-1 modal-trigger botonesr " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/anadir.png" /></i>Nuevo</a>
                      </div>	
                  </td>
                  <td class="">




                  </td>
              </tr>
          </table>



     <?php 
      
      include('../vista/proveedorVista.php');
      
      mostrarProveedor();
      
      
      ?>


          <!-- ********************************** modal ********************************** --> 

          <div id="modal1P" class="modal">
          <div class="modal-content">
          <div id="mensajeP2"></div>
              <form class="col s8">
                  <div class="row">
                      <div class="nav-wrapper grey darken-4">
                          <div>
                              <p class="encabezadotextomodal"> Subir Video </p>

                              <a id="modalcerrar"  onClick="cierre();"  class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a> 
                          </div>	

                      </div>
                  </div>
                  
                  
                  <div class="row">
                  
                                       <div class="input-field col s10 offset-s2">
                                         <div class="input-field col s6">
                                            <div class="file-field input-field">
                                              <div class="btn">
                                                <span>Video</span>
                                                <input type="file" id="imagen1" name="imagen1" onChange="previsualizarImagenes(this,'perfil','imagen1');">
                                              </div>
                                              <div class="file-path-wrapper">
                                                <input id="foto" class="file-path validate" type="text" placeholder="Foto">
                                              </div>
                                            </div>
                  
                  
                                                    <div class="foto bordefoto" style="height:400px;">
                                                    <video id="imagen1Puesta"  style="width: 240%;margin-left: -40%;height:100%;" autoplay='true' controls="controls">
                                                        <source src=""  type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"; video/mov; video/flv; video/mkv; video/wmv'>
                                                       
                                                        Your browser does not support HTML5 video.
                                                    </video>
                                                    </div>
                                          </div>          
                                     </div>
                  
                                     
                  
                                     </div>
                 
              </form>
          </div>
          <div class="modal-footer">
              <a id="btnInsertarP2" onClick="subirImagenes(document.getElementById('imagen1'),'perfil','imagen1','1');" class=" modal-action waves-effect waves-light btn blue lighten-1 " >Aceptar</a>


          </div>
      </div>
      <!-- nuevo fin -->

        <div id="modal3P" class="modal">
          <div class="modal-content">
          <div id="mensajeP3"></div>
              <form class="col s8">
                  <div class="row">
                      <div class="nav-wrapper grey darken-4">
                          <div>
                              <p class="encabezadotextomodal"> ver Video </p>

                              <a id="modalcerrar"  onClick="cierre();"  class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a> 
                          </div>	

                      </div>
                  </div>
                  
                  
                  <div class="row">
                  
                                       <div class="input-field col s10 offset-s2">
                                         <div class="input-field col s6">
                                            
                  
                  
                                                    <div class="foto bordefoto" style="height:400px;">
                                                    <video id="imagenver1"  style="width: 240%;margin-left: -40%;height:100%;" autoplay="true" controls="controls">
                                                        <source src=""  type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                                                       
                                                        Your browser does not support HTML5 video.
                                                    </video>
                                                    </div>
                                          </div>          
                                     </div>
                  
                                     
                  
                                     </div>
                 
              </form>
          </div>
          <div class="modal-footer">
              <a id="btnInsertarP33" href="" target="_blank" class=" modal-action waves-effect waves-light btn blue lighten-1 " >Descargar</a>


          </div>
      </div>

          <!-- Eliminar fin --->
          <!-- modal distribuidor -->
          
          <div id="modal4P" class="modal">
              <div class="modal-content">
                  <div class="col s8">
                      <div class="row">
                          <div class="nav-wrapper grey darken-4">
                              <div>
                                  <p class="encabezadotextomodal"> Distribuidores </p>

                                  <a id="modalcerrar" class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a> 
                              </div>	

                          </div>
                      </div>
                <div id="distribuidorContenedor">
                </div>
                  </div>
              </div>
             
          </div>
          
          <!-- Distribuidor Fin --> 
           

          <!-- ********************************** modal fin ********************************** -->  
