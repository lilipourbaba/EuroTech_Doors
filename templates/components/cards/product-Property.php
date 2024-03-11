<div class="product-properties" id="tab1" onClick="JavaScript:selectTab(1);">specifications</div>

<div id="tab1Content" class="product-tab">
    <div class="Variable-name">
        <button> color</button>
        <button> color</button>
        <button> color</button>
        <button> color</button>
        <button> color</button>
    </div>
    <div class="Variable-value">
        <button> color</button>
        <button> color</button>
        <button> color</button>
        <button> color</button>
        <button> color</button>
    </div>
    <div class="Variable-name">
        <button> color</button>
        <button> color</button>
        <button> color</button>
        <button> color</button>
        <button> color</button>
    </div>
    <div class="Variable-value">
        <button> color</button>
        <button> color</button>
        <button> color</button>
        <button> color</button>
        <button> color</button>
    </div>
</div>

<div class="product-properties" id="tab2" onClick="JavaScript:selectTab(2);">product description</div>

<div id="tab2Content" class="product-tab">
    <?php the_content() ?>
</div>


<div class="product-properties" id="tab3" onClick="JavaScript:selectTab(3);">product catalog</div>
<div id="tab3Content" class="product-tab">
    <a href="<?= get_field("catalog"); ?>"> Catalog </a>

</div>



<div class="product-properties" id="tab4" onClick="JavaScript:selectTab(4);">frequently asked question</div>



<div id="tab4Content" class="product-tab">
    <button> weight</button>
    <button> height</button>
    <button> color</button>
    <button> color</button>
    <button> color</button>

</div>