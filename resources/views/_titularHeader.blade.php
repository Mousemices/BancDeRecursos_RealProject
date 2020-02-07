<div id="banc">
    <div class="hoverLay"></div>
    <div class="vistaCenter">
            <h1>Pont Solidari</h1>
            <p>Pont Solidari. Reutilitzem equipaments en bon estat d'empreses i organitzacions per a entitats socials</p>
            <div class="selection">
                <form action="/batch/create" method="get">
                    @csrf 
                    <input type="submit" value="Vull donar"/>
                </form>
            <form action="petition/create" method="post">
                    @csrf
                    <a href="#section1"></a>
                    <input type="submit" value="Vull rebre" />
            </form>
            </div>
    </div> 
</div>