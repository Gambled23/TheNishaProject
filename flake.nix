{
  description = "Flake con php, composer y nodejs";

  inputs = {
    nixpkgs.url = "github:nixos/nixpkgs/nixos-unstable";
  };

  outputs = { self, nixpkgs }: let
    pkgs = nixpkgs.legacyPackages.x86_64-linux;
  in
  {
    packages.x86_64-linux.php82 = pkgs.php82;
    packages.x86_64-linux.composer = pkgs.php82Packages.composer;
    packages.x86_64-linux.nodejs_20 = pkgs.nodejs_20;

    defaultPackage.x86_64-linux = pkgs.mkShell {
      nativeBuildInputs = with pkgs; [
        php82
        php82Packages.composer
        nodejs_20
      ];
    };
  };
}