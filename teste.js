import { v4 as uuidv4 } from 'uuid';

class Produto {
    constructor(nome, descricao, preco, imagem) {
        this.nome = nome;
        this.descricao = descricao;
        this.preco = preco;
        this.imagem = imagem;
        this.id = Produto.generateId();
    }

    static generateId() {
        return '_' + uuidv4();
    }

    adicionarAoDOM() {
        const produtosSection = document.getElementById('produtos');
        const produtoDiv = document.createElement('div');
        produtoDiv.classList.add('produto');
        produtoDiv.id = this.id;

        produtoDiv.innerHTML = `
            <img src="${this.imagem}" alt="${this.nome}">
            <h3>${this.nome}</h3>
            <p>${this.descricao}</p>
            <p class="preco">${this.preco.toFixed(2)} R$</p>
            <button class="add-to-cart-btn" data-product-id="${this.id}">Adicionar ao Carrinho</button>
            <button class="remove-from-cart-btn" data-product-id="${this.id}">Remover do Carrinho</button>
            <button class="remove-product-btn" data-product-id="${this.id}">Remover Produto</button>
        `;

        produtosSection.appendChild(produtoDiv);

        produtoDiv.querySelector('.add-to-cart-btn').addEventListener('click', () => this.addToCart());
        produtoDiv.querySelector('.remove-from-cart-btn').addEventListener('click', () => this.removeFromCart());
        produtoDiv.querySelector('.remove-product-btn').addEventListener('click', () => this.removeProduct());
    }
}

function removeProduct(productId) {
    const produtoDiv = document.getElementById(productId);
    if (produtoDiv) {
        produtoDiv.remove();
    }
}

$(document).ready(function () {
    $('.carousel').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 2000
    });

    $('#product-form').on('submit', function (event) {
        event.preventDefault();

        const nome = $('#product-name').val();
        const descricao = $('#product-description').val();
        const preco = parseFloat($('#product-price').val());
        const imagem = $('#product-image').val();

        const novoProduto = new Produto(nome, descricao, preco, imagem);
        novoProduto.adicionarAoDOM();

        this.reset();
    });
});
    
function addToCart(productId) {
    let cartCount = $('#cart-count').text();
    cartCount = parseInt(cartCount) + 1;
    $('#cart-count').text(cartCount);

    let cartTotal = $('#cart-total').text().replace(' R$', '').replace(',', '.');
    let price = $('.produto').find('.preco').text().replace(' R$', '').replace(',', '.');
    cartTotal = (parseFloat(cartTotal) + parseFloat(price)).toFixed(2);
    $('#cart-total').text(cartTotal.replace('.', ',') + ' R$');

    $.ajax({
        type: "POST",
        url: "adicionar_carrinho.php",
        data: { id_produto: productId },
        success: function(response) {
            alert(response);
        },
        error: function(xhr, status, error) {
            console.error("Erro ao adicionar produto ao carrinho:", error);
        }
    });
}  

function removeFromCart(button) {
    let cartCount = $('#cart-count').text();
    let cartTotal = $('#cart-total').text().replace(' R$', '').replace(',', '.');
    let price = $(button).siblings('.preco').text().replace(' R$', '').replace(',', '.');

    cartCount = parseInt(cartCount) - 1;
    cartTotal = (parseFloat(cartTotal) - parseFloat(price)).toFixed(2);

    if (cartCount < 0) cartCount = 0;
    if (cartTotal < 0) cartTotal = 0;

    $('#cart-count').text(cartCount);
    $('#cart-total').text(cartTotal.replace('.', ',') + ' R$');
}

function loadCart() {
    $.ajax({
        type: "GET",
        url: "carregar_carrinho.php",
        dataType: "json",
        success: function(cartData) {
            if (cartData) {
                $('#cart-count').text(cartData.count);
                $('#cart-total').text(cartData.total.toFixed(2).replace('.', ',') + ' R$');
            }
        },
        error: function(err) {
            console.error('Erro ao carregar o carrinho:', err);
        }
    });
}

function clearCart() {
    $('#cart-count').text('0');
    $('#cart-total').text('0,00 R$');
}

var radio = document.querySelector('.manual-btn')
var cont = 1

document.getElementById('radio1').checked = true

setInterval(() => {
    proximaImg()
}, 2000)

function proximaImg() {
    cont++
    if (cont > 3) {
        cont = 1
    }
    document.getElementById('radio' + cont).checked = true
}

