<div id="menu">
	<span>DataBase</span>
 	<span><?=$nameUser; ?></span>
	<div id="userlogin"> 
		<div id="lo"></div>
		<div id="form">
			<input type="hidden" id="idUser" name="idUser" value="<?=$idUser?>"/>
			<input type="hidden" id="nameUser" name="nameUser" value="<?=$nameUser?>"/>
			<input type="hidden" id="imgUser" name="imgUser" value="<?=$imgUser?>"/>
		</div>
	</div>
	
	<ul id="menuSele" class="one">
		<li>Perfil</li>
		<li>dados</li>
		<li id="closeLogi">Sair</li>
	</ul>
	
	
</div>

<div id="bWo">
	<div id="menuBa">
		<ul id="menuSel">
			
			<li id="pro">Produto</li> 
			<li id="use">Users</li>
			<li id="dat">Estoque</li> 
			<li id="tab">Gerenciar</li>
		</ul>
		
		
		<div id="prop">
			PROPRIEDADE
<!--			<ul id="">-->
<!--
				<li id="creat" onclick="alert(this.id)">Create</li>
				<li id="selec">Select</li> 
				<li id="updat">Update</li> 
				<li id="delet">Delet</li>
-->
				<input id="statuBu" type="text" disabled="disabled" value="">
<!--			</ul>-->
		</div>

	</div>
	
			<div id="us" class="SL one">
				<input type="text"   id="f_id"    onclick="texInp(this.id)" onchange="checktedInpuS(this.id)" value="id">
				<input type="text"   id="f_nome"  onclick="texInp(this.id)" onchange="checktedInpuS(this.id)" value="nome">
				<input type="hidden" id="f_pwd"   onchange="checktedInpuS(this.id)" value="">
				<input type="text"   id="f_email" onclick="texInp(this.id)" onchange="checktedInpuS(this.id)" value="email">
				<input type="text"   id="f_type"  onclick="texInp(this.id)" onchange="checktedInpuS(this.id)" value="type">
				<input type="hidden" id="f_priv"  value="">
				<input type="hidden" id="f_img"   value="">
				<input type="hidden" id="f_statu" value="">
				
				<button onclick="getE('ulUsSe')">FILTER</button>
			</div>

			<div id="pr" class="SL one"> 
				<input type="text"   id="D_id"   onclick="texInp(this.id)" onchange="checktedInpuP(this.id)" value="id">
				<input type="text"   id="D_cod"  onclick="texInp(this.id)" onchange="checktedInpuP(this.id)" value="cod">
				<input type="text"   id="D_tipo" onclick="texInp(this.id)" onchange="checktedInpuP(this.id)" value="tipo">
				<input type="text"   id="D_nome" onclick="texInp(this.id)" onchange="checktedInpuP(this.id)" value="nome">
				<input type="hidden" id="D_quan" value="">
				<input type="hidden" id="D_img"  value="">
				<input type="hidden" id="D_scu"  value="">
				<button onclick="getE('ulPrSe')">FILTER</button>
			</div>
 
	
	<div id="work">
		
  
	</div>
	
 
	
</div>


<script src='js/adm.js'></script>