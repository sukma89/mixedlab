% Demo module of Erlang
-module(demo).
-export([double/1, multi/2]).

double(Value) ->
    times(Value, 2).

multi(Value, Value2) ->
    Value * Value2.

times(X, Y) ->
    X * Y.

