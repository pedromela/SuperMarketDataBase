-- nome do fornecedor que forneceu o maior numero de categorias

select nome from (
  select nome, categoria from fornece_sec natural inner join produto natural inner join fornecedor
    group by nome,categoria
  UNION ALL
  select nome, categoria from fornecedor inner join produto on fornecedor.nif = produto.forn_primario
    group by nome,categoria) as A
  group by nome
  having count(nome) >= all (
    select count(nome) from (
      select nome, categoria from fornece_sec natural inner join produto natural inner join fornecedor
      UNION ALL
      select nome, categoria from fornecedor inner join produto on fornecedor.nif = produto.forn_primario) as B
  group by nome
);

--  fornecedores primários (nome e nif) que forneceram produtos de todas as categorias simples

select nome, nif from produto inner join fornecedor on produto.forn_primario = fornecedor.nif
where categoria in ( select nome from categoria_simples )
group by nome, nif
having count(nome) = (
  select count(*) from categoria_simples
);

-- produtos (ean) que nunca foram repostos

select ean from produto where ean not in (
  select ean from reposicao natural inner join produto
);

-- produtos (ean) com um número de fornecedores secundários superior a 10

SELECT ean FROM fornece_sec GROUP BY ean HAVING count(*) > 10;

-- produtos (ean) que foram repostos sempre pelo mesmo operador

select ean from reposicao group by ean having count(operador) = 1;
