<template>
   
    <i
        v-if="isCustomer == 'true'"
        :class="`material-icons ${addClass ? addClass : ''} ${isActive ? 'noActive' : 'isActive'}  ${showBtn?'  ':'i-block'}`"
        @mouseover="isActive ? isActive = !isActive : ''"
        @mouseout="active !== '' && !isActive ? isActive = !isActive : ''"
         style='width:40px'  
    >

        {{ isActive ? 'star_border' : 'star_purple500' }}
         
    </i>

    <a
        style='width:40px'
        v-else
        :title="`${isActive ? addTooltip : removeTooltip}`"
        @click="toggleProductWishlist(productId)"
        :class="` wishlist-icons ${addClass ? addClass : ''} ${showBtn?'  ':'else-block'}`">

        <i
            style='width:40px'
            @mouseout="! isStateChanged ? isActive = !isActive : isStateChanged = false"
            @mouseover="! isStateChanged ? isActive = !isActive : isStateChanged = false"
            :class="`material-icons ${addClass ? addClass : ''} ${isActive ? 'isActive' : 'noActive'}`  "
        >

            {{ isActive ? 'star_purple500' : 'star_border' }}
            
        </i>

        <span style="vertical-align: super;" v-html="text"></span>
    </a>
  
</template>

<script type="text/javascript">
    export default {
        props: [
            'text',
            'active',
            'addClass',
            'addedText',
            'productId',
            'removeText',
            'isCustomer',
            'productSlug',
            'moveToWishlist',
            'addTooltip',
            'removeTooltip',
            'showBtn'
        ],

        data: function () {
            return {
                isStateChanged: false,
                isActive: this.active,
            }
        },

        created: function () {
            if (this.isCustomer == 'false') {
                this.isActive = this.isWishlisted(this.productId);
            }
        },

        methods: {
            toggleProductWishlist: function (productId) {
                var updatedValue = [productId];
                let existingValue = this.getStorageValue('wishlist_product');

                if (existingValue) {
                    var valueIndex = existingValue.indexOf(productId);

                    if (valueIndex == -1) {
                        this.isActive = true;
                        existingValue.push(productId);
                    } else {
                        this.isActive = false;
                        existingValue.splice(valueIndex, 1);
                    }

                    updatedValue = existingValue;
                }

                this.$root.headerItemsCount++;
                this.isStateChanged = true;

                this.setStorageValue('wishlist_product', updatedValue);

                window.showAlert(
                    'alert-success',
                    this.__('shop.general.alert.success'),
                    this.isActive ? this.addedText : this.removeText
                );

                if (this.moveToWishlist && valueIndex == -1) {
                    window.location.href = this.moveToWishlist;
                }

                return true;
            },

            isWishlisted: function (productId) {
                let existingValue = this.getStorageValue('wishlist_product');

                if (existingValue) {
                    return ! (existingValue.indexOf(productId) == -1);
                } else {
                    return false;
                }
            }
        }
    }
</script>