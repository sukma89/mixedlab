% Demo module of Erlang
-module(demo).
-export([double/1, multi/2, area/1, factorial/1]).

double(Value) ->
    times(Value, 2).

multi(Value, Value2) ->
    Value * Value2.

times(X, Y) ->
    X * Y.

area({square, Side}) -> 
    Side * Side;

area({triangle, A, B, C}) ->
    S = (A + B + C)/2,
    math:sqrt(S*(S-A)*(S-B)*(S-C)).

factorial(N) when N > 0 ->
    N * factorial(N - 1);
factorial(0) -> 1.
