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
                  <div class="input-field col s10 offset-s1">
                                           <div class="col-sm-6 ol-md-6 col-xs-12">
                                                <div >
                                                    <h3>Subir Video</h3>
                                                    <input type="file" id="input-file-now-custom-2" class="dropify" data-height="200"  name="input-file-now-custom-2" onChange="previsualizarImagenes(this,'perfil','input-file-now-custom-2');"  />
                                                </div>
                                            </div>
                                                     
                                         </div>
                                       <div class="input-field col s10 offset-s2">
                                         <div class="input-field col s6">
                                                    
                                                    <div class="foto bordefoto" style="height:400px;">
                                                    <video id="input-file-now-custom-2Puesta"  style="width: 240%;margin-left: -40%;height:100%;" autoplay='true' controls="controls">
                                                        <source src=""  type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"; video/ogg; codecs="theora,vorbis"; video/webm; codecs="vp8,vorbis";video/x-ms-wmv'>
                                                       
                                                        Your browser does not support HTML5 video.
                                                    </video>
                                                    </div>
                                          </div>          
                                     </div>
                  
                                     
                  
                                     </div>
                 
              </form>
          </div>
          <div class="modal-footer">
              <a id="btnInsertarP2" onClick="subirImagenes(document.getElementById('input-file-now-custom-2'),'perfil','input-file-now-custom-2','1');" class=" modal-action waves-effect waves-light btn blue lighten-1 " >Aceptar</a>


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
                                                        <source src=""  type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"; video/ogg; codecs="theora,vorbis"; video/webm; codecs="vp8,vorbis";video/x-ms-wmv'>
                                                       
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
