<script setup>
import { computed } from 'vue';
import { effectivePrice, money, discountPercentage } from '@/utils/Domain';
import StockBadge from './StockBadge.vue';


const props = defineProps({
    products:{
        type:Array,
        required:true,
        validator: p => {
            p.id && p.name && Number.isInteger(p.price)
            && p.price > 0 && Number.isInteger(p.stock)
            && p.stock >= 0
        }
    },
    compact: {
        type:Boolean,
        default:false
    }
});

const emit = defineEmits({ add: p => Boolean(p?.id) })


</script>

<template>
    <div class="product-grid">
      <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
      <article
        v-for="product in products"
        :key="product.id"
        class="product-card"
        data-component="ProductCard"
        data-product-id="2"
      >
        <div class="product-media">
          <a aria-label="Voir Oignons de Potou" href="produits/02-oignons.html">
            <img
              :alt="product.name"
              height="240"
              loading="lazy"
              :src="product.image"
              width="360"
            />
          </a>
          <span
           v-if="discountPercentage(product) > 0"
           class="promo-tag"> Promo −{{ discountPercentage(product) }} % </span>
        </div>
        <div class="product-body">
          <p class="overline">{{ product.origin }}</p>
          <h3>
            <a href="produits/02-oignons.html"> {{ product.name }} </a>
          </h3>
          <p class="muted small">kg · {{ product.stock }} disponible(s)</p>
          <StockBadge :stock="product.stock"/>
          <div class="product-bottom">
            <div>
              <del v-if="discountPercentage(product) > 0"> {{ money(product.price) }}</del>
              <strong> {{ money( effectivePrice(product)) }} </strong>
            </div>
            <button
              :disabled="product.stock === 0 || product.active == false"
              aria-label="Ajouter Oignons de Potou au panier"
              class="add-button"
              data-action="ajouter-panier"
              type="button"
            >
              <svg
                aria-hidden="true"
                class="icon"
                fill="none"
                height="20"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.7"
                viewbox="0 0 24 24"
                width="20"
              >
                <path d="M12 5v14M5 12h14"></path>
              </svg>
            </button>
          </div>
        </div>
      </article>
    </div>

</template>