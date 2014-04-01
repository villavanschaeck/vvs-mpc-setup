all: patch

patch: extract
	sed -i 's@append @&ks=http://http.setup.msc.vvs-nijmegen.nl/ks.cfg @g' ubuntu-installer/i386/boot-screens/txt.cfg
	sed -i 's/timeout 0/timeout 1/g' pxelinux.cfg/default

extract: netboot.tar.gz
	tar xvf netboot.tar.gz

netboot.tar.gz:
	wget http://archive.ubuntu.com/ubuntu/dists/precise-updates/main/installer-i386/current/images/netboot/netboot.tar.gz

distclean: clean
	rm -f netboot.tar.gz

clean:
	rm -rf pxelinux.0 pxelinux.cfg ubuntu-installer version.info mscboot.kpxe
