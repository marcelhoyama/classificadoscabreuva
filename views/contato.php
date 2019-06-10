<div class="container">
    


<form id="contato" method="POST">
    <p class="h1 text-center">Contato</p>
    
    <!--<iframe width="560" height="315" src="https://www.youtube.com/embed/vLHiTQFQwnM?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>-->
    <div class="form-group">
        <label for="assunto " class="label ">Selecione o Assunto:</label> <label class="text-danger"> campo obrigatorio!</label>
        <select class="form-control" name="assunto" id="assunto">
            <option></option>
            <option>Quer Anunciar</option>
            <option>Sugestão</option>
            <option>Reclamação</option>
        </select>
    </div>
    <div class="form-group">
        <label for="mensagem " class="label "></label> <label class="text-danger"> campo obrigatorio!</label>
        <textarea class="form-control" name="mensagem" id="mensagem" placeholder="Digite sua mensagem" type="text"></textarea>
    </div>
    <div class="form-group">
        <label for="nome" class="label "></label> <label class="text-danger"> campo obrigatorio!</label>
        <input class="form-control" name="nome" id="nome" placeholder="Digite o nome completo" type="text"/>
    </div>
    <div class="form-group">
        <label for="email" class="label "></label> <label class="text-danger"> campo obrigatorio!</label>
        <input class="form-control" name="email" id="email" placeholder="Digite seu e-mail proprio" type="text"/>
    </div>
    <div class="form-group">
        <label for="telefone" class="label "></label> <label class="text-danger"> campo obrigatorio!</label>
        <input class="form-control" name="telefone" id="telefone" placeholder="Digite o numero telefone com DDD" type="text"/>
    </div>
    <input type="button" class="btn btn-primary" value="Enviar" />     
    
    
    
</form>

<div class="form-group">
        <address class="text-info address">
            <h2>Nosso Contato?</h2>    
            Endereço: <?php echo $value=$viewData['endereco']; ?></br>
           
            Celular: <?php echo $value = $viewData['celular']; ?><span><img src="<?php BASE_URL;?>assets/images/whatsapp.png " width="30" height="30"/></span></br>
            Email: <?php echo $value = $viewData['email']; ?></br>
            <a href="https://www.facebook.com/macielprestacaoservico/" class="navbar-nav"><img src="<?php BASE_URL; ?>assets/images/facebookcolor.png" width="32" height="32" style="margin-top: 8px" class="float-right"/></a><br><br>

<!--            Horário de Funcionamento: 
            <?php echo $value = $viewData['horario']; ?></br>-->
        </address>
        <hr/>
        <img src="<?php BASE_URL ?>assets/images/sem-imagem.gif" width="300" height="300" class="img-rounded img-responsive">
        <br>



        <div class="mapa">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3665.2430705558018!2d-47.061580185550774!3d-23.270615956803372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cf39559edb3f41%3A0xaa7afbcc1a60b7b6!2sRua+Iugusl%C3%A1via%2C+89%2C+Cabre%C3%BAva+-+SP%2C+13315-000!5e0!3m2!1spt-BR!2sbr!4v1552525165104" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="mapamobile">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3665.2430705558018!2d-47.061580185550774!3d-23.270615956803372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cf39559edb3f41%3A0xaa7afbcc1a60b7b6!2sRua+Iugusl%C3%A1via%2C+89%2C+Cabre%C3%BAva+-+SP%2C+13315-000!5e0!3m2!1spt-BR!2sbr!4v1552525165104" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="mapamobile2">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3665.2430705558018!2d-47.061580185550774!3d-23.270615956803372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cf39559edb3f41%3A0xaa7afbcc1a60b7b6!2sRua+Iugusl%C3%A1via%2C+89%2C+Cabre%C3%BAva+-+SP%2C+13315-000!5e0!3m2!1spt-BR!2sbr!4v1552525165104" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="mapamobile3">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3665.2430705558018!2d-47.061580185550774!3d-23.270615956803372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cf39559edb3f41%3A0xaa7afbcc1a60b7b6!2sRua+Iugusl%C3%A1via%2C+89%2C+Cabre%C3%BAva+-+SP%2C+13315-000!5e0!3m2!1spt-BR!2sbr!4v1552525165104" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
</div>
