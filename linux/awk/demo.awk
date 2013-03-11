BEGIN {
    print "Starting.."
}
NR > 1 && NF > 0{
    printf("%s ", $1)
}
NR > 1 && NF > 2 {
    print $3
}
NR > 1 && NF <= 2 && NF > 0 {
    print "has No Email"
}
END {
    print "Done"
}
