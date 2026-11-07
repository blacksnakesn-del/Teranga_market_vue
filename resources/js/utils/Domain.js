export function effectivePrice(product) {
    const price = Number(product.price);
    const salePrice = Number(product.salePrice);

    return product.salePrice != null && product.price > 0
        && salePrice < price
        ? salePrice : price
}

export function money(amount) {
    if(amount === null || amount == undefined) return '';

    const formated = Number(amount).toLocaleString('FR-fr');
    return `${formated} FCFA`;
}

export function discountPercentage(product) {
    const price = Number(product.price);
    const salePrice = Number(product.salePrice);

    if(product.salePrice === null || salePrice <= 0 || price <= 0 || salePrice >= price) {
        return 0;
    }

    return Math.round(((price - salePrice) / price) * 100);
}